<?php

class AlertMessage
{
        public static function auto_parse()
        {						
                if (isset($_SESSION['auto_parse']) && ($_SESSION['auto_parse']==true))
                {														
                         ?><div class="successUpdate" id="successUpdate">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Автоматический поиск запущен. Раз в сутки Вы будете получать уведомление на почту о результатах проверки.
                                </div>
                        </div><?
                        unset($_SESSION['auto_parse']);
                } 
        }
        public static function errorform_null()
        {						
                if (isset($_SESSION['errorform_null']) && ($_SESSION['errorform_null']==true))
                {														
                         ?><div class="errorUpdate" id="errorUpdate">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Заполните хотя бы одно поле формы.
                                </div>
                        </div><?
                        unset($_SESSION['errorform_null']);
                } 
        }
        public static function limit_null()
        {						
                if (isset($_SESSION['limit_null']) && ($_SESSION['limit_null']==true))
                {														
                         ?><div class="errorUpdate" id="errorUpdate">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Ваш лимит запросов в течении суток исчерпан.
                                </div>
                        </div><?
                        unset($_SESSION['limit_null']);
                } 
        }
        public static function limit_up()
        {						
                if (isset($_SESSION['limit_up']) && ($_SESSION['limit_up']==true))
                {														
                         ?><div class="successUpdate" id="successUpdate">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Ваш лимит запросов пополнен.
                                </div>
                        </div><?
                        unset($_SESSION['limit_up']);
                } 
        }
        public static function deletedata()
        {						
                if (isset($_SESSION['deletedata']) && ($_SESSION['deletedata']==true))
                {														
                         ?><div class="successUpdate" id="successUpdate">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Данные были успешно удалены.
                                </div>
                        </div><?
                        unset($_SESSION['deletedata']);
                } 
        }
        public static function messagesend()
        {						
                if (isset($_SESSION['messagesend']) && ($_SESSION['messagesend']==true))
                {														
                         ?><div class="successUpdate" id="successUpdate">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Благодарим, за обращение. Мы свяжемся с Вами в ближайшее время.
                                </div>
                        </div><?
                        unset($_SESSION['messagesend']);
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
        public static function successEdit()
        {						
                if (isset($_SESSION['editing_success']) && ($_SESSION['editing_success']==true))
                {														
                         ?><div class="successUpdate" id="successUpdate">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Ваш профиль успешно отредактирован.
                                </div>
                        </div><?
                        unset($_SESSION['editing_success']);
                } 
        }
        public static function successEditRecoveryPassword()
        {						
                if (isset($_SESSION['editingRecoveryPassword_success']) && ($_SESSION['editingRecoveryPassword_success']==true))
                {														
                         ?><div class="successUpdate" id="successUpdate">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Пароль был изменён и прислан на указанную при регистрации почту.
                                </div>
                        </div><?
                        unset($_SESSION['editingRecoveryPassword_success']);
                } 
        }
        public static function errorEdit_loginExists()
        {						
                if (isset($_SESSION['login_exists']) && ($_SESSION['login_exists']==true))
                {														
                         ?><div class="errorUpdate" id="errorUpdate">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Такой логин уже существует.
                                </div>
                        </div><?
                        unset($_SESSION['login_exists']);
                } 
        }
        public static function errorEdit_short_password_or_login()
        {						
                if (isset($_SESSION['short_password_or_login']) && ($_SESSION['short_password_or_login']==true))
                {														
                         ?><div class="errorUpdate" id="errorUpdate">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Пароль и логин должны состоять минимум из 8, а имя из 2 символов.
                                </div>
                        </div><?
                        unset($_SESSION['short_password_or_login']);
                } 
        }
        public static function errorEdit_short_answer()
        {						
                if (isset($_SESSION['short_answer']) && ($_SESSION['short_answer']==true))
                {														
                         ?><div class="errorUpdate" id="errorUpdate">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Контрольный ответ должен быть больше, чем 1 символ.
                                </div>
                        </div><?
                        unset($_SESSION['short_answer']);
                } 
        }
        public static function errorEdit_short_login()
        {						
                if (isset($_SESSION['short_login']) && ($_SESSION['short_login']==true))
                {														
                         ?><div class="errorUpdate" id="errorUpdate">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Логин должнен состоять минимум из 8, а имя из 2 символов.
                                </div>
                        </div><?
                        unset($_SESSION['short_login']);
                } 
        }
        public static function errorEdit_short_password()
        {						
                if (isset($_SESSION['short_password']) && ($_SESSION['short_password']==true))
                {														
                         ?><div class="errorUpdate" id="errorUpdate">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Пароль должнен состоять минимум из 8 символов.
                                </div>
                        </div><?
                        unset($_SESSION['short_password']);
                } 
        }
        public static function errorEdit_same_password()
        {						
                if (isset($_SESSION['same_password']) && ($_SESSION['same_password']==true))
                {														
                         ?><div class="errorUpdate" id="errorUpdate">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка.</strong> Это Ваш текущий пароль.
                                </div>
                        </div><?
                        unset($_SESSION['same_password']);
                } 
        }
        public static function errorEdit_passwords_not_match()
        {						
                if (isset($_SESSION['passwords_not_match']) && ($_SESSION['passwords_not_match']==true))
                {														
                         ?><div class="errorUpdate" id="errorUpdate">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Пароли не совпадают.
                                </div>
                        </div><?
                        unset($_SESSION['passwords_not_match']);
                } 
        }
        public static function successRegistration()
        {
                if (isset($_SESSION['successRegistration']) && ($_SESSION['successRegistration']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Ваш аккаунт успешно зарегистрирован. На указанную почту были высланы реквизиты для входа на сайт.
                                </div>
                        </div><?
                        unset($_SESSION['successRegistration']);
                }
        }
        public static function errorRegistration_email_not_send()
        {
                if (isset($_SESSION['errorRegistration_email_not_send']) && ($_SESSION['errorRegistration_email_not_send']==true))
                {														
                         ?><div class="errorRegistration" id="errorRegistration">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Ваш аккаунт зарегистрирован и готов в использованию, однако при регистрации не были высланы реквизиты для входа на сайт. Возможно произошла задержка письма. Обратитесь за помощью к администрации.
                                </div>
                        </div><?
                        unset($_SESSION['errorRegistration_email_not_send']);
                }
        }
        public static function errorBuy_email_not_send()
        {
                if (isset($_SESSION['errorBuy_email_not_send']) && ($_SESSION['errorBuy_email_not_send']==true))
                {														
                         ?><div class="errorRegistration" id="errorRegistration">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Письмо не было отправлено. Возможно произошла задержка письма. Напишите мне через форму обратной связи в углу страницы.
                                </div>
                        </div><?
                        unset($_SESSION['errorBuy_email_not_send']);
                }
        }
        public static function errorRegistration_incorrect_login_or_password()
        {
                if (isset($_SESSION['incorrect_login_or_password']) && ($_SESSION['incorrect_login_or_password']==true))
                {														
                         ?><div class="errorRegistration" id="errorRegistration">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Неправильный логин или пароль.
                                </div>
                        </div><?

                        unset($_SESSION['incorrect_login_or_password']);
                }
        }
        public static function infoRegistration_enter_login_and_password()
        {
                if (isset($_SESSION['enter_login_and_password']) && ($_SESSION['enter_login_and_password']==true))
                {														
                         ?><div class="errorRegistration" id="errorRegistration">
                                 <div class="alert alert-info" align="center" role="alert">
                                        <strong>Стоп!</strong> Введите логин и пароль.
                                </div>
                        </div><?
                        unset($_SESSION['enter_login_and_password']);
                }
        }
        public static function successSendEntry()
        {
                if (isset($_SESSION['successSendEntry']) && ($_SESSION['successSendEntry']==true))
                {														
                         ?><div class="successRegistration" id="successRegistration">
                                 <div class="alert alert-success" align="center" role="alert">
                                        <strong>Выполнено!</strong> Ваша запись была отправлена. Благодарю, за обращение. Я свяжусь с Вами в ближайшее время.
                                </div>
                        </div><?
                        unset($_SESSION['successSendEntry']);
                }
        }
        public static function errorTypeFile()
        {
                if (isset($_SESSION['errorTypeFile']) && ($_SESSION['errorTypeFile']==true))
                {														
                         ?><div class="successRegistration" id="errorTypeFile">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Тип файла, который вы попытались загрузить, не поддерживается.
                                </div>
                        </div><?
                        unset($_SESSION['errorTypeFile']);
                }
        }
        public static function errorSizePicture()
        {
                if (isset($_SESSION['errorSizePictures']) && ($_SESSION['errorSizePictures']==true))
                {														
                         ?><div class="errorRegistration" id="errorSizePicture">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Размер одного из загружаемых файлов больше допустимых 20МБ.
                                </div>
                        </div><?
                        unset($_SESSION['errorSizePictures']);
                }
        }

        public static function errorRecovery_loginNoneExists()
        {
                if (isset($_SESSION['loginNoneExists']) && ($_SESSION['loginNoneExists']==true))
                {														
                         ?><div class="errorRegistration" id="errorRegistration">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Нет аккаунта с таким логином.
                                </div>
                        </div><?                                                          
                        unset($_SESSION['loginNoneExists']);
                }
        }

        public static function errorAnswer_answerNoneExists()
        {
                if (isset($_SESSION['answerNoneExists']) && ($_SESSION['answerNoneExists']==true))
                {														
                         ?><div class="errorRegistration" id="errorRegistration">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ответ неверный!</strong> Возможно, вы сделали опечатку или выбрали не ту раскладку клавиатуры.
                                </div>
                        </div><?                                                          
                        unset($_SESSION['answerNoneExists']);
                }
        }
        public static function errorCaptcha_dont_push_captcha()
        {
                if (isset($_SESSION['dont_push_captcha']) && ($_SESSION['dont_push_captcha']==true))
                {														
                         ?><div class="errorRegistration" id="errorRegistration">
                                 <div class="alert alert-danger" align="center" role="alert">
                                        <strong>Ошибка!</strong> Защита от роботов не пройдена.
                                </div>
                        </div><?                                                          
                        unset($_SESSION['dont_push_captcha']);
                }
        }
//ПОКА НЕ ИСПОЛЬЗОВАНО ========================================================================
        public static function warning()
        {
                ?>
                <div class="alert alert-warning" align="center" role="alert">
                        <strong>Осторожно!</strong> Better check yourself, you're not looking too good.
                </div>
                <?
        }
}

