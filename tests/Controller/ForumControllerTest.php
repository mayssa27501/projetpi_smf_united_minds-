<?php

namespace App\Test\Controller;

use App\Entity\Forum;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ForumControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/forum/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Forum::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Forum index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'forum[titreForum]' => 'Testing',
            'forum[descriptifForum]' => 'Testing',
            'forum[dateForum]' => 'Testing',
            'forum[idTopic]' => 'Testing',
        ]);

        self::assertResponseRedirects('/sweet/food/');

        self::assertSame(1, $this->getRepository()->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Forum();
        $fixture->setTitreForum('My Title');
        $fixture->setDescriptifForum('My Title');
        $fixture->setDateForum('My Title');
        $fixture->setIdTopic('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Forum');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Forum();
        $fixture->setTitreForum('Value');
        $fixture->setDescriptifForum('Value');
        $fixture->setDateForum('Value');
        $fixture->setIdTopic('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'forum[titreForum]' => 'Something New',
            'forum[descriptifForum]' => 'Something New',
            'forum[dateForum]' => 'Something New',
            'forum[idTopic]' => 'Something New',
        ]);

        self::assertResponseRedirects('/forum/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getTitreForum());
        self::assertSame('Something New', $fixture[0]->getDescriptifForum());
        self::assertSame('Something New', $fixture[0]->getDateForum());
        self::assertSame('Something New', $fixture[0]->getIdTopic());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Forum();
        $fixture->setTitreForum('Value');
        $fixture->setDescriptifForum('Value');
        $fixture->setDateForum('Value');
        $fixture->setIdTopic('Value');

        $$this->manager->remove($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/forum/');
        self::assertSame(0, $this->repository->count([]));
    }
}
