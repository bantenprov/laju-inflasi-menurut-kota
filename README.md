# Laju Inflasi Menurut Kota

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/laju-inflasi-kota/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/laju-inflasi-kota/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/laju-inflasi-kota/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/laju-inflasi-kota/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/laju-inflasi-kota/v/stable)](https://packagist.org/packages/bantenprov/laju-inflasi-kota)
[![Total Downloads](https://poser.pugx.org/bantenprov/laju-inflasi-kota/downloads)](https://packagist.org/packages/bantenprov/laju-inflasi-kota)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/laju-inflasi-kota/v/unstable)](https://packagist.org/packages/bantenprov/laju-inflasi-kota)
[![License](https://poser.pugx.org/bantenprov/laju-inflasi-kota/license)](https://packagist.org/packages/bantenprov/laju-inflasi-kota)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/laju-inflasi-kota/d/monthly)](https://packagist.org/packages/bantenprov/laju-inflasi-kota)
[![Daily Downloads](https://poser.pugx.org/bantenprov/laju-inflasi-kota/d/daily)](https://packagist.org/packages/bantenprov/laju-inflasi-kota)

Laju Inflasi Menurut Kota

### Install via composer

- Development snapshot

```bash
$ composer require bantenprov/laju-inflasi-menurut-kota:dev-master
```

- Latest release:

```bash
$ composer require bantenprov/laju-inflasi-menurut-kota
```

### Download via github

```bash
$ git clone https://github.com/fadika06/laju-inflasi-menurut-kota.git
```

#### Edit `config/app.php` :

```php
'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\LajuInflasiKota\LajuInflasiKotaServiceProvider::class,
```

#### Lakukan migrate :

```bash
$ php artisan migrate
```

#### Publish database seeder :

```bash
$ php artisan vendor:publish --tag=laju-inflasi-kota-seeds
```

#### Lakukan auto dump :

```bash
$ composer dump-autoload
```

#### Lakukan seeding :

```bash
$ php artisan db:seed --class=BantenprovLajuInflasiKotaSeeder
```

#### Lakukan publish component vue :

```bash
$ php artisan vendor:publish --tag=laju-inflasi-kota-assets
$ php artisan vendor:publish --tag=laju-inflasi-kota-public
```
#### Tambahkan route di dalam file : `resources/assets/js/routes.js` :

```javascript
{
    path: '/dashboard',
    redirect: '/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
         path: '/dashboard/laju-inflasi-kota',
         components: {
            main: resolve => require(['./components/views/bantenprov/laju-inflasi-kota/DashboardLajuInflasiKota.vue'], resolve),
            navbar: resolve => require(['./components/Navbar.vue'], resolve),
            sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
          },
          meta: {
            title: "Laju Inflasi Menurut Kota"
           }
       },
        //== ...
    ]
},
```

```javascript
{
    path: '/admin',
    redirect: '/admin/dashboard/home',
    component: layout('Default'),
    children: [
        //== ...
        {
            path: '/admin/laju-inflasi-kota',
            components: {
                main: resolve => require(['./components/bantenprov/laju-inflasi-kota/LajuInflasiKota.index.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Laju Inflasi Menurut Kota"
            }
        },
        {
            path: '/admin/laju-inflasi-kota/create',
            components: {
                main: resolve => require(['./components/bantenprov/laju-inflasi-kota/LajuInflasiKota.add.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Add Laju Inflasi Menurut Kota"
            }
        },
        {
            path: '/admin/laju-inflasi-kota/:id',
            components: {
                main: resolve => require(['./components/bantenprov/laju-inflasi-kota/LajuInflasiKota.show.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "View Laju Inflasi Menurut Kota"
            }
        },
        {
            path: '/admin/laju-inflasi-kota/:id/edit',
            components: {
                main: resolve => require(['./components/bantenprov/laju-inflasi-kota/LajuInflasiKota.edit.vue'], resolve),
                navbar: resolve => require(['./components/Navbar.vue'], resolve),
                sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
            },
            meta: {
                title: "Edit Laju Inflasi Menurut Kota"
            }
        },
        //== ...
    ]
},
```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
    name: 'Dashboard',
    icon: 'fa fa-dashboard',
    childType: 'collapse',
    childItem: [
        //== ...
        {
         name: 'Laju Inflasi Menurut Kota',
         link: '/dashboard/laju-inflasi-kota',
         icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},
```

```javascript
{
    name: 'Admin',
    icon: 'fa fa-lock',
    childType: 'collapse',
    childItem: [
        //== ...
        {
          name: 'Laju Inflasi Menurut Kota',
          link: '/admin/laju-inflasi-kota',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
    ]
},
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript
//== Example Vuetable

import ExampleVueTable from './components/vue-table/ExampleVueTable.vue';
Vue.component('example-vue-table', ExampleVueTable);

import LajuInflasiKota from './components/bantenprov/laju-inflasi-kota/LajuInflasiKota.chart.vue';
Vue.component('echarts-laju-inflasi-kota', LajuInflasiKota);

import LajuInflasiKotaKota from './components/bantenprov/laju-inflasi-kota/LajuInflasiKotaKota.chart.vue';
Vue.component('echarts-laju-inflasi-kota-kota', LajuInflasiKotaKota);

import LajuInflasiKotaTahun from './components/bantenprov/laju-inflasi-kota/LajuInflasiKotaTahun.chart.vue';
Vue.component('echarts-laju-inflasi-kota-tahun', LajuInflasiKotaTahun);

import LajuInflasiKotaAdminShow from './components/bantenprov/laju-inflasi-kota/LajuInflasiKotaAdmin.show.vue';
Vue.component('admin-view-laju-inflasi-kota-tahun', LajuInflasiKotaAdminShow);

//== Echarts Group Egoverment

import LajuInflasiKotaBar01 from './components/views/bantenprov/laju-inflasi-kota/LajuInflasiKotaBar01.vue';
Vue.component('laju-inflasi-kota-bar-01', LajuInflasiKotaBar01);

import LajuInflasiKotaBar02 from './components/views/bantenprov/laju-inflasi-kota/LajuInflasiKotaBar02.vue';
Vue.component('laju-inflasi-kota-bar-02', LajuInflasiKotaBar02);

//== mini bar charts
import LajuInflasiKotaBar03 from './components/views/bantenprov/laju-inflasi-kota/LajuInflasiKotaBar03.vue';
Vue.component('laju-inflasi-kota-bar-03', LajuInflasiKotaBar03);

import LajuInflasiKotaPie01 from './components/views/bantenprov/laju-inflasi-kota/LajuInflasiKotaPie01.vue';
Vue.component('laju-inflasi-kota-pie-01', LajuInflasiKotaPie01);

import LajuInflasiKotaPie02 from './components/views/bantenprov/laju-inflasi-kota/LajuInflasiKotaPie02.vue';
Vue.component('laju-inflasi-kota-pie-02', LajuInflasiKotaPie02);

//== mini pie charts
import LajuInflasiKotaPie03 from './components/views/bantenprov/laju-inflasi-kota/LajuInflasiKotaPie03.vue';
Vue.component('laju-inflasi-kota-pie-03', LajuInflasiKotaPie03);
```
