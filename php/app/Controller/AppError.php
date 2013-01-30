<?php
//in app/Config/core.php
Configure::write('Error.handler', 'AppError::handleError');

//in app/Config/bootstrap.php
App::uses('AppError', 'Lib');

//in app/Lib/AppError.php
class AppError {
    public static function handleError($code, $description, $file = null, $line = null, $context = null) {
        list(, $level) = ErrorHandler::mapErrorCode($code);
        if ($level === LOG_ERROR) {
            // Ignore fatal error. It will keep the PHP error message only
            return false;
        }
        return ErrorHandler::handleError($code, $description, $file, $line, $context);
    }
}