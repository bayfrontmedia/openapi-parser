## OpenAPI Parser

PHP OpenAPI specification parser.

This library supports [OAS 3.1](https://swagger.io/specification/#version-3.1.0), 
and resolves internal OpenAPI specification references.
The OpenAPI specification can then be parsed into PHP objects.

- [License](#license)
- [Author](#author)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)

## License

This project is open source and available under the [MIT License](LICENSE).

## Author

<img src="https://cdn1.onbayfront.com/bfm/brand/bfm-logo.svg" alt="Bayfront Media" width="250" />

- [Bayfront Media homepage](https://www.bayfrontmedia.com?utm_source=github&amp;utm_medium=direct)
- [Bayfront Media GitHub](https://github.com/bayfrontmedia)

## Requirements

* PHP >= 8.0

## Installation

```
composer require bayfrontmedia/opanapi-parser
```

## Usage

The `OpenApiSpec` class is used to parse JSON and YAML files into an array, as well as resolving any internal references.

The resolved specification array can then be used to create an `OpenApiObject` instance. 
All OpenAPI object class instances implement `ObjectInterface`.

The `ObjectInterface` includes a `validate()` method to validate against the OpenAPI specification,
but all validation functions are currently rudimentary and should not be relied upon.
It is advised to use this library with an OpenAPI specification which has already been tested as valid.

> NOTE: The `resolve` method can be quite slow depending on the size of the OpenAPI specification. 
> It is strongly suggested to save/cache the resolved specification to use in production.

### Example

```php
$spec = OpenApiSpec::parseJson(file_get_contents('openapi-specification.json')); // Parse JSON
$spec = OpenApiSpec::resolve($spec); // Resolve internal references (this file should be saved/cached)

$openapi = new OpenApiObject($spec); // Create new OpenApiObject using a resolved and valid OpenAPI specification

// Get PathItemObject for a single path
$path = $openapi->getPath('/auth/login');
$request = $path->getOperation($path::OPERATION_POST);
```

Additional documentation coming soon.