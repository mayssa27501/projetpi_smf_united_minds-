<?php

namespace App\Test\Controller;

use App\Entity\CategorieArticle;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategorieArticleControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/categorie/article/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(CategorieArticle::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('CategorieArticle index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'categorie_article[nomCatArtic]' => 'Testing',
            'categorie_article[dateAjoutArtic]' => 'Testing',
            'categorie_article[descriptifArtic]' => 'Testing',
            'categorie_article[idArtic]' => 'Testing',
        ]);

        self::assertResponseRedirects('/sweet/food/');

        self::assertSame(1, $this->getRepository()->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new CategorieArticle();
        $fixture->setNomCatArtic('My Title');
        $fixture->setDateAjoutArtic('My Title');
        $fixture->setDescriptifArtic('My Title');
        $fixture->setIdArtic('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('CategorieArticle');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new CategorieArticle();
        $fixture->setNomCatArtic('Value');
        $fixture->setDateAjoutArtic('Value');
        $fixture->setDescriptifArtic('Value');
        $fixture->setIdArtic('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'categorie_article[nomCatArtic]' => 'Something New',
            'categorie_article[dateAjoutArtic]' => 'Something New',
            'categorie_article[descriptifArtic]' => 'Something New',
            'categorie_article[idArtic]' => 'Something New',
        ]);

        self::assertResponseRedirects('/categorie/article/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getNomCatArtic());
        self::assertSame('Something New', $fixture[0]->getDateAjoutArtic());
        self::assertSame('Something New', $fixture[0]->getDescriptifArtic());
        self::assertSame('Something New', $fixture[0]->getIdArtic());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new CategorieArticle();
        $fixture->setNomCatArtic('Value');
        $fixture->setDateAjoutArtic('Value');
        $fixture->setDescriptifArtic('Value');
        $fixture->setIdArtic('Value');

        $$this->manager->remove($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/categorie/article/');
        self::assertSame(0, $this->repository->count([]));
    }
}
