<?php

class AlertMessageForAdmin
{
        //==================================== создание Пользователя ==========================================
        public static function successInsert_successCreateUser()
        {
                if (isset($_SESSION['successCreateUser']) && ($_SESSION['successCreateUser']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Пользователь был успешно создан.
                                </div>
                        </div><?
                        unset($_SESSION['successCreateUser']);
                }
        }
        // обновление пользователя
        public static function successUpdate_successUpdateUser()
        {
                if (isset($_SESSION['successUpdateUser']) && ($_SESSION['successUpdateUser']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Пользователь был успешно отредактирован.
                                </div>
                        </div><?
                        unset($_SESSION['successUpdateUser']);
                }
        }
        // удаление пользователя
        public static function successDelete_successDeleteUser()
        {
                if (isset($_SESSION['successDeleteUser']) && ($_SESSION['successDeleteUser']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Пользователь был успешно удалён.
                                </div>
                        </div><?
                        unset($_SESSION['successDeleteUser']);
                }
        }
        // Пароль пользователя был успешно изменен
        public static function successUpdate_successUpdatePasswordUser()
        {
                if (isset($_SESSION['successUpdatePasswordUser']) && ($_SESSION['successUpdatePasswordUser']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Пароль был успешно изменён.
                                </div>
                        </div><?
                        unset($_SESSION['successUpdatePasswordUser']);
                }
        }
        // Услуги были успешно отредактированы
        public static function successUpdate_successUpdateServices()
        {
                if (isset($_SESSION['successUpdateServices']) && ($_SESSION['successUpdateServices']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Услуги успешно отредактированы.
                                </div>
                        </div><?
                        unset($_SESSION['successUpdateServices']);
                }
        }
        // Успешное добавление услуги
        public static function successUpdate_successCreateServices()
        {
                if (isset($_SESSION['successCreateServices']) && ($_SESSION['successCreateServices']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Новая услуга успешно добавлена.
                                </div>
                        </div><?
                        unset($_SESSION['successCreateServices']);
                }
        }
        // Услуги не были успешно отредактированы
        public static function errorUpdate_errorUpdateServices()
        {
                if (isset($_SESSION['errorUpdateServices']) && ($_SESSION['errorUpdateServices']==true))
                {														
                         ?><div class="errorRegistration" id="errorRegistration">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Упс....Что-то пошло не так. Обратитесь к администратору.
                                </div>
                        </div><?
                        unset($_SESSION['errorUpdateServices']);
                }
        }
        // Проверка на старый пароль
        public static function errorUpdate_errorOld_password()
        {
                if (isset($_SESSION['incorrect_old_password']) && ($_SESSION['incorrect_old_password']==true))
                {														
                         ?><div class="errorRegistration" id="errorRegistration">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Вы ввели не верный старый пароль.
                                </div>
                        </div><?
                        unset($_SESSION['incorrect_old_password']);
                }
        }
        //=============================Не удачная отправка email=====================================
        public static function errorRegistration_email_not_send()
        {
                if (isset($_SESSION['errorRegistration_email_not_send']) && ($_SESSION['errorRegistration_email_not_send']==true))
                {														
                         ?><div class="errorRegistration" id="errorRegistration">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> При регистрации не были высланы реквизиты для входа на сайт.
                                </div>
                        </div><?
                        unset($_SESSION['successRegistration']);
                }
        }
        // ============================= не удачное создание товара=====================================
        public static function errorInsert_errorCreateProduct()
        {
                if (isset($_SESSION['errorCreateProduct']) && ($_SESSION['errorCreateProduct']==true))
                {														
                         ?><div class="errorRegistration" id="errorRegistration">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Товар не был добавлен.
                                </div>
                        </div><?
                        unset($_SESSION['errorCreateProduct']);
                }
        }
        public static function errorUpdate_errorUpdateProduct()
        {
                if (isset($_SESSION['errorUpdateProduct']) && ($_SESSION['errorUpdateProduct']==true))
                {														
                         ?><div class="errorRegistration" id="errorRegistration">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Товар не был отредактирован.
                                </div>
                        </div><?
                        unset($_SESSION['errorUpdateProduct']);
                }
        }
        public static function errorInsert_errorNullDescription()
        {
                if (isset($_SESSION['errorNullDescription']) && ($_SESSION['errorNullDescription']==true))
                {														
                         ?><div class="errorRegistration" id="errorRegistration">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Добавьте описание к товару.
                                </div>
                        </div><?
                        unset($_SESSION['errorNullDescription']);
                }
        }
        public static function errorUpload_errorUploadFile()
        {
                if (isset($_SESSION['errorUploadFile']) && ($_SESSION['errorUploadFile']==true))
                {														
                         ?><div class="errorRegistration" id="errorRegistration">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Добавьте, пожалуйста, к товару изображения.
                                </div>
                        </div><?
                        unset($_SESSION['errorUploadFile']);
                }
        }
        // ===================================== создание товара ====================================================
        public static function successInsert_successCreateProduct()
        {
                if (isset($_SESSION['successCreateProduct']) && ($_SESSION['successCreateProduct']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Товар был успешно добавлен.
                                </div>
                        </div><?
                        unset($_SESSION['successCreateProduct']);
                }
        }
        public static function errorCount_errorCountPictures()
        {
                if (isset($_SESSION['errorCountPictures']) && ($_SESSION['errorCountPictures']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Количество загружаемых файлов не должно быть больше 3.
                                </div>
                        </div><?
                        unset($_SESSION['errorCountPictures']);
                }
        }
        // Обновление email для заявкти
        public static function successUpdate_successUpdateEmail_for_orders()
        {
                if (isset($_SESSION['successUpdateEmail_for_orders']) && ($_SESSION['successUpdateEmail_for_orders']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Email успешно обновлён.
                                </div>
                        </div><?
                        unset($_SESSION['successUpdateEmail_for_orders']);
                }
        }
        // обновление товара
        public static function successUpdate_successUpdatePhoto()
        {
                if (isset($_SESSION['successUpdatePhoto']) && ($_SESSION['successUpdatePhoto']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Фото успешно обновлено.
                                </div>
                        </div><?
                        unset($_SESSION['successUpdatePhoto']);
                }
        }
        // удаление товара
        public static function successDelete_successDeleteProduct()
        {
                if (isset($_SESSION['successDeleteProduct']) && ($_SESSION['successDeleteProduct']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Товар был успешно удалён.
                                </div>
                        </div><?
                        unset($_SESSION['successDeleteProduct']);
                }
        }

        //==================================== создание категории ==========================================
        public static function successInsert_successCreateCategory()
        {
                if (isset($_SESSION['successCreateCategory']) && ($_SESSION['successCreateCategory']==true))
                {														
                         ?>
                         <div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <p><strong>Выполнено!</strong> Категория была успешно добавлена.</p>
                                </div>
                        </div>
                        <?
                        unset($_SESSION['successCreateCategory']);
                }
        }
        // обновление категории
        public static function successUpdate_successUpdateCategory()
        {
                if (isset($_SESSION['successUpdateCategory']) && ($_SESSION['successUpdateCategory']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Категория была успешно отредактирована.
                                </div>
                        </div><?
                        unset($_SESSION['successUpdateCategory']);
                }
        }
        // удаление категории
        public static function successDelete_successDeleteCategory()
        {
                if (isset($_SESSION['successDeleteCategory']) && ($_SESSION['successDeleteCategory']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Категория и соответствующие ей товары были успешно удалёны.
                                </div>
                        </div><?
                        unset($_SESSION['successDeleteCategory']);
                }
        }

        //==================================== создание меню ==========================================
        public static function successInsert_successCreateMenu()
        {
                if (isset($_SESSION['successCreateMenu']) && ($_SESSION['successCreateMenu']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Меню было успешно добавлено.
                                </div>
                        </div><?
                        unset($_SESSION['successCreateMenu']);
                }
        }
        // обновление меню
        public static function successUpdate_successUpdateMenu()
        {
                if (isset($_SESSION['successUpdateMenu']) && ($_SESSION['successUpdateMenu']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Меню было успешно отредактировано.
                                </div>
                        </div><?
                        unset($_SESSION['successUpdateMenu']);
                }
        }
        // удаление меню
        public static function successDelete_successDeleteMenu()
        {
                if (isset($_SESSION['successDeleteMenu']) && ($_SESSION['successDeleteMenu']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Меню было успешно удалено.
                                </div>
                        </div><?
                        unset($_SESSION['successDeleteMenu']);
                }
        }

        // ==============================редактирование вкладок меню================================
        // обновление меню О нас
        public static function successUpdate_successUpdateMenuAbout_us()
        {
                if (isset($_SESSION['successUpdateMenuAbout_us']) && ($_SESSION['successUpdateMenuAbout_us']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Меню "О нас" было успешно отредактировано.
                                </div>
                        </div><?
                        unset($_SESSION['successUpdateMenuAbout_us']);
                }
        }
        // обновление меню Магазин
        public static function successUpdate_successUpdateMenuShop()
        {
                if (isset($_SESSION['successUpdateMenuShop']) && ($_SESSION['successUpdateMenuShop']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Меню "Магазин" было успешно отредактировано.
                                </div>
                        </div><?
                        unset($_SESSION['successUpdateMenuShop']);
                }
        }
        // обновление меню Мой аккаунт
        public static function successUpdate_successUpdateMenuMy_account()
        {
                if (isset($_SESSION['successUpdateMenuMy_account']) && ($_SESSION['successUpdateMenuMy_account']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Меню "Мой аккаунт" было успешно отредактировано.
                                </div>
                        </div><?
                        unset($_SESSION['successUpdateMenuMy_account']);
                }
        }
        // обновление меню Доставка
        public static function successUpdate_successUpdateMenuDelivery()
        {
                if (isset($_SESSION['successUpdateMenuDelivery']) && ($_SESSION['successUpdateMenuDelivery']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Меню "Доставка" было успешно отредактировано.
                                </div>
                        </div><?
                        unset($_SESSION['successUpdateMenuDelivery']);
                }
        }
        // обновление меню Контакты
        public static function successUpdate_successUpdateMenuContacts()
        {
                if (isset($_SESSION['successUpdateMenuContacts']) && ($_SESSION['successUpdateMenuContacts']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Меню "Контакты" было успешно отредактировано.
                                </div>
                        </div><?
                        unset($_SESSION['successUpdateMenuContacts']);
                }
        }
        // обновление меню Услуги
        public static function successUpdate_successUpdateMenuServices()
        {
                if (isset($_SESSION['successUpdateMenuServices']) && ($_SESSION['successUpdateMenuServices']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Меню "Услуги" было успешно отредактировано.
                                </div>
                        </div><?
                        unset($_SESSION['successUpdateMenuServices']);
                }
        }
        // обновление меню Покупаем
        public static function successUpdate_successUpdateMenuBuy()
        {
                if (isset($_SESSION['successUpdateMenuBuy']) && ($_SESSION['successUpdateMenuBuy']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Меню "Покупаем" было успешно отредактировано.
                                </div>
                        </div><?
                        unset($_SESSION['successUpdateMenuBuy']);
                }
        }
}

