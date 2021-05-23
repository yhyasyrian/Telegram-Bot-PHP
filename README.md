# Telegram-Bot-PHP
* طريقة تشغيل البوتات باستخدام ميثود getupdates
* الطريقة تعمل على السيرفرات فقط 🙂
# Commands Screen
* تشغيل أي ملف بدون توقف من خلال السكرين 💯
```
screen -S NameScreen Run R
```
<b>Example 🔰 :</b>
```
screen -S Bot php ./bot.php R
```
* السكرينات الموجودة بالسيرفر 👁‍🗨
```
screen -ls
```
* حذف سكرين 🗑
```
screen -X -S NameScreen kill
```
<b>Example 🔰 :</b>
```
screen -X -S 10749.Bot kill
```
<b>ملاحظه:</b><br>
يجب ان يكون الاسم الموجود ضمن قائمة screen -ls وليس الذي تم وضعه عند إنشاء السكرين ✔️
