<?php


class TestCase extends Illuminate\Foundation\Testing\TestCase 
{

    public function tearDown()
    {
        Mockery::close();
    }
    
    /**
     * Creates the application.
     *
     * @return Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $unitTesting = true;

        $testEnvironment = 'test-foo';

        return require __DIR__.'/../../../bootstrap/start.php';
    }


    /**
     * Assert an associative array has one or more keys
     * 
     * @param  string|array $keys 
     */
    protected function assertArrayHasKeys($keys, $array)
    {
        if (! is_array($keys)) {
            $this->assertArrayHasKey($keys, $array);
            return;
        }

        foreach($keys as $key) {
            $this->assertArrayHasKeys($key, $array);
        }
    }

    protected function callProtectedMethod($test, $method, $args)
    {
        $class = new \ReflectionClass(get_class($test));
        $protectedMethod = $class->getMethod($method);
        $protectedMethod->setAccessible(true);
        $output = $protectedMethod->invokeArgs($test, $args);
        return $output;
    }

    protected function getProtectedProperty($test, $property)
    {
        $class = new \ReflectionClass(get_class($test));
        $protectedProperty = $class->getProperty($property);
        $protectedProperty->setAccessible(true);
        $output = $protectedProperty->getValue($test);
        return $output;
    }
    
}
