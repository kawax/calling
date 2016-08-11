# 電話番号からエリアを判定

## Install

### Composer
```
composer require revolution/calling
```

### Laravel

```php
Revolution\Calling\Providers\CallingServiceProvider::class,
```

```php
'Calling' => Revolution\Calling\Facades\Calling::class,
```

## 使い方

```php
use Revolution\Calling\Calling;

$calling = new Calling();

$area = $calling->area('09000000000');

//"携帯電話・PHS"
```

### 自分で用意した市外局番データを使う
```php
use Revolution\Calling\Calling;

$calling = new Calling();

//一部入れ替え
$data = $calling->getNumber();
$data['0120'] = 'フリーダイヤル';

//全部なら配列で用意
$data = [];

$calling->setNumber($data);

$area = $calling->area('01200000');
//"フリーダイヤル"
```

### Laravel
```php
use Calling;

$area = Calling::area('090000');
```

## 市外局番データ
- http://www.soumu.go.jp/main_sosiki/joho_tsusin/top/tel_number/shigai_list.html からWORD版ファイルをダウンロード。
- コピペしたり変換したりしてnumber.csvを用意。

```
php data/convert.php
```
でnumber.jsonが作られる。

## LICENSE
MIT  
Copyright kawax
