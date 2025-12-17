# Покрокова інструкція зі створення та налаштування Laravel-проєкту (MVC)

## Частина 1. Теорія та інструкція 

### Що таке Laravel
Laravel — це PHP-фреймворк, який використовує архітектуру MVC (Model–View–Controller) для створення вебзастосунків.

### Встановлення Laravel

#### 1. Встановлення Composer
```bash
composer --version
```

#### 2. Створення проєкту
```bash
composer create-project laravel/laravel mvc-project
cd mvc-project
```

#### 3. Запуск сервера
```bash 
php artisan serve
```

---

## Початкове налаштування
Файл `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mvc_project
DB_USERNAME=root
DB_PASSWORD=
```

---

## MVC в Laravel
- Model — робота з БД
- View — відображення (Blade)
- Controller — логіка між Model та View

---

## Визначення елементів
- **Міграція** — структура БД
- **Фабрика** — генерація тестових даних
- **Сідер** — наповнення БД
- **Маршрут** — шлях URL

---

## Частина 2. Реалізація в коді (5 балів)

### Створення моделі, міграції та контролера
```bash
php artisan make:model News -mcr
```

### Міграція
```php
Schema::create('news', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('content');
    $table->timestamps();
});
```

```bash
php artisan migrate
```

### Модель
```php
class News extends Model {
    protected $fillable = ['title', 'content'];
}
```

### Контролер
```php
class NewsController extends Controller {
    public function index() {
        $news = News::all();
        return view('news.index', compact('news'));
    }
}
```

### View
```html
<h1>Новини</h1>
@foreach($news as $item)
<h3>{{ $item->title }}</h3>
<p>{{ $item->content }}</p>
@endforeach
```

### Маршрут
```php
Route::get('/news', [NewsController::class, 'index']);
```

### Фабрика
```php
return [
    'title' => fake()->sentence(),
    'content' => fake()->paragraph()
];
```

### Сідер
```php
News::factory(10)->create();
```

```bash
php artisan db:seed --class=NewsSeeder
```

---

## Висновок
Проєкт реалізує архітектуру MVC з використанням моделей, контролерів, шаблонів, міграцій, фабрик та сідерів.
