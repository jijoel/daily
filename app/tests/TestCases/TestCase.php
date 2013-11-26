<?php


class TestCase extends Illuminate\Foundation\Testing\TestCase 
{

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
