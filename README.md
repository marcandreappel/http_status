# HTTP Status

![Travis build status](https://travis-ci.org/marcandreappel/http_status.svg?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/marcandreappel/http_status/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/marcandreappel/http_status/?branch=master) [![Code Intelligence Status](https://scrutinizer-ci.com/g/marcandreappel/http_status/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

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
