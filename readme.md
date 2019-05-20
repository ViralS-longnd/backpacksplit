# BackpackSplit

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require longnd/backpacksplit
```

## Usage
Optional you can publish the configuration to provide a different service provider stub. The default is here.

``` bash
$ php artisan vendor:publish --provider="LongND\BackpackSplit\BackpackSplitServiceProvider"
```
With DemoCrudController in App\Http\Controller\Admin\DemoCrudController we edit it if you have a default CRUD Controller:

``` bash
namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\DemoController;


// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\DemoRequest as StoreRequest;
use App\Http\Requests\DemoRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use LongND\BackpackSplit\Traits\SetupModal;

/**
 * Class StoreCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class StoreCrudController extends CrudController
{
    use SetupModal;
    public function setup()
    {
        //code-here....
        $this->setupModal();
        //code-here...
    }
}
```
and if you want to create new backpack controller with modal crud you try:
```bash
$ php artisan backpack:crud demo --option=modal
```
to use ModalCRUD and result:

![image](https://user-images.githubusercontent.com/50614639/57922381-d4797500-78c9-11e9-87ca-e659fd198df1.png)


####OR

``` bash
namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\DemoController;


// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\DemoRequest as StoreRequest;
use App\Http\Requests\DemoRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use LongND\BackpackSplit\Traits\SetupSplit;

/**
 * Class StoreCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class StoreCrudController extends CrudController
{
    use SetupSplit;
    public function setup()
    {
        //code-here....
        $this->setupSplit('col-md-8');
        //code-here...
    }
}
```
and if you want to create new backpack controller with split crud you try:
```bash
$ php artisan backpack:crud demo --option=split
```
to use SplitCRUD and result:

![image](https://user-images.githubusercontent.com/50614639/57922518-2de1a400-78ca-11e9-9567-7bc3ca970300.png)


## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/longnd/backpacksplit.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/longnd/backpacksplit.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/longnd/backpacksplit/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/longnd/backpacksplit
[link-downloads]: https://packagist.org/packages/longnd/backpacksplit
[link-travis]: https://travis-ci.org/longnd/backpacksplit
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/longnd
[link-contributors]: ../../contributors
