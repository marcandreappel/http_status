# HTTP Status

## Usage

```php
class MyClass {
    use \MarcAndreAppel\HttpStatus\HttpStatusTrait;
    
    public function myFunction() {
        $httpStatus = $this->httpStatusCode(400);
        
        $httpStatus->header();
        print($httpStatus->message);
    }
}
```