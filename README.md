# HTTP Status

![Travis build status](https://travis-ci.org/marcandreappel/http_status.svg?branch=master)

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