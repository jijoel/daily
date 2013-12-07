<?php

use Days\Day014\StrController;


class StrControllerTest extends ControllerTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->test = new StrController();
        $this->setupLayout($this->test);
        $this->layout = $this->getLayout($this->test);
    }

    public function testSetup() {}

    public function testIndexReturnsView()
    {
        $this->test->index();

        $this->assertLayoutHas('content', 'table');        
    }

    /**
     * @dataProvider getSampleData
     * @group integration
     */
    public function testIndexViewContainsSampleData($text, $context=Null)
    {
        $this->call('GET', '/day014');
        $crawler = $this->client->getCrawler();

        $this->assertGreaterThan(0, $crawler->filter(
            "{$context}:contains({$text})")->count());
    }

    public function getSampleData()
    {
        return array(
            array('one_test_item', 'tr th'),
            array('OneTestItem',   'tr th'),
            array('one_test_item', 'tr td'),
            array('OneTestItem',   'tr td'),
            array('camel',         'tr td'),
        );
    }

    /**
     * @group integration
     */
    public function testStoreShowsItem()
    {
        $input = array('custom'=>'foo bar');
        $result = $this->call('POST', 'day014', $input);
        $crawler = $this->client->getCrawler();

        $this->assertCount(1, $crawler->filter(
            "tr td:contains(foo-bar)"));
    }

    /**
     * group integration
     */
    public function testStoreBlankValueShowsNothing()
    {
        $input = array('custom'=>'');
        $result = $this->call('POST', 'day014', $input);

        $this->assertNotContains('<td></td>', $result->getContent());
    }
}

