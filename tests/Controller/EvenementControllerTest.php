<?php

namespace App\Test\Controller;

use App\Entity\Evenement;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EvenementControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/evenement/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Evenement::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Evenement index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'evenement[nom]' => 'Testing',
            'evenement[descriptif]' => 'Testing',
            'evenement[image]' => 'Testing',
            'evenement[likes]' => 'Testing',
            'evenement[nbParticipants]' => 'Testing',
            'evenement[idCategorie]' => 'Testing',
        ]);

        self::assertResponseRedirects('/sweet/food/');

        self::assertSame(1, $this->getRepository()->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Evenement();
        $fixture->setNom('My Title');
        $fixture->setDescriptif('My Title');
        $fixture->setImage('My Title');
        $fixture->setLikes('My Title');
        $fixture->setNbParticipants('My Title');
        $fixture->setIdCategorie('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Evenement');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Evenement();
        $fixture->setNom('Value');
        $fixture->setDescriptif('Value');
        $fixture->setImage('Value');
        $fixture->setLikes('Value');
        $fixture->setNbParticipants('Value');
        $fixture->setIdCategorie('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'evenement[nom]' => 'Something New',
            'evenement[descriptif]' => 'Something New',
            'evenement[image]' => 'Something New',
            'evenement[likes]' => 'Something New',
            'evenement[nbParticipants]' => 'Something New',
            'evenement[idCategorie]' => 'Something New',
        ]);

        self::assertResponseRedirects('/evenement/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getDescriptif());
        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getLikes());
        self::assertSame('Something New', $fixture[0]->getNbParticipants());
        self::assertSame('Something New', $fixture[0]->getIdCategorie());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Evenement();
        $fixture->setNom('Value');
        $fixture->setDescriptif('Value');
        $fixture->setImage('Value');
        $fixture->setLikes('Value');
        $fixture->setNbParticipants('Value');
        $fixture->setIdCategorie('Value');

        $$this->manager->remove($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/evenement/');
        self::assertSame(0, $this->repository->count([]));
    }
}
