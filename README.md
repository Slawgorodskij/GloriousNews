Итоговая работа по курсу "Laravel. Глубокое погружение"

Верстка минимальна. 
Для авторизации и аутентификации использовались:
- laravel/fortify;
- laravel/ui;
- laravel-permission. 
Реализовано посещение страниц незарегистрированными пользователями, 
оставление коментариев только зарегистрированными пользователями. 
Пользователь с ролью администратора может:
- зарегистрировать пользователя;
- изменить роль пользователя;
- именить категорию новостей;
- изменить новость. При аутентификации возможно войти используя социальную сеть (вконтакте или фейсбук).

Реализована возможность смены языка (русский, английский).

Реализована очередь используя redis для парсинга новостей с других сайтов.




