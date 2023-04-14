<?php

namespace App\Test\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/article/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Article::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Article index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'article[titreArtic]' => 'Testing',
            'article[themeArtic]' => 'Testing',
            'article[dateAjoutArtic]' => 'Testing',
            'article[descreptifArtic]' => 'Testing',
            'article[idU]' => 'Testing',
        ]);

        self::assertResponseRedirects('/sweet/food/');

        self::assertSame(1, $this->getRepository()->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Article();
        $fixture->setTitreArtic('My Title');
        $fixture->setThemeArtic('My Title');
        $fixture->setDateAjoutArtic('My Title');
        $fixture->setDescreptifArtic('My Title');
        $fixture->setIdU('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Article');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Article();
        $fixture->setTitreArtic('Value');
        $fixture->setThemeArtic('Value');
        $fixture->setDateAjoutArtic('Value');
        $fixture->setDescreptifArtic('Value');
        $fixture->setIdU('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'article[titreArtic]' => 'Something New',
            'article[themeArtic]' => 'Something New',
            'article[dateAjoutArtic]' => 'Something New',
            'article[descreptifArtic]' => 'Something New',
            'article[idU]' => 'Something New',
        ]);

        self::assertResponseRedirects('/article/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getTitreArtic());
        self::assertSame('Something New', $fixture[0]->getThemeArtic());
        self::assertSame('Something New', $fixture[0]->getDateAjoutArtic());
        self::assertSame('Something New', $fixture[0]->getDescreptifArtic());
        self::assertSame('Something New', $fixture[0]->getIdU());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Article();
        $fixture->setTitreArtic('Value');
        $fixture->setThemeArtic('Value');
        $fixture->setDateAjoutArtic('Value');
        $fixture->setDescreptifArtic('Value');
        $fixture->setIdU('Value');

        $$this->manager->remove($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/article/');
        self::assertSame(0, $this->repository->count([]));
    }
}
