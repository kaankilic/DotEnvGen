# Documentation

EnvDotGen is a simple php based class for generating .env file. You can use an example .env file to read or create new one without any example.

### Version
v1.5

### Usage Examples

```php
$n = new DotEnvGen();
$n->parseExample();
$n->setField("APP_ENV","production");
$n->setField("APP_DEBUG","false");
$n->setField("DB_HOST","localhost");
$n->setField("DB_PORT","3306");
$n->setField("DB_DATABASE","homestead");
$n->setField("DB_USERNAME","homestead");
$n->setField("DB_PASSWORD","homestead");
$n->setField("MAIL_DRIVER","homestead");
$n->setField("MAIL_HOST","homestead");
$n->setField("MAIL_PORT","homestead");
$n->setField("MAIL_USERNAME","homestead");
$n->setField("MAIL_PASSWORD","homestead");
$n->setField("MAIL_ENCRYPTION","homestead");
$n->createEnv(".env_1");

```
**Free Software, Hell Yeah!**
MIT Licensed.