<?php

/**
 * cette fonction construit un message
 * on se basant sur les messages donn�s dans messages.php
 *   
 */
function getValidationMessage($errorName, $associ)
{
    global $messages;
    // On s�lectionne le message
    $msg = $messages[$errorName][getLanguage()];

    // On remplace tous param�tres par leurs valeurs
    foreach ($associ as $key => $val) {

        $msg = str_replace('{' . $key . '}', $val, $msg);
    }

    return $msg;
}

/**
 * Permet d'entourer un text par une balise avec classe CSS
 */
function insertTextInTag($tag, $text, $class = '')
{
    return '<' . $tag . ' class="' . $class . '">' . $text . '</' . $tag . '>';
}


/**
 * Construit un message d'erreur
 */
function errorMsg($text, $type = 2)
{
    if ($type == 1) {
        return '<p class="text-danger">' . $text . '</p>';
    }
    return '<div class="alert alert-danger col-md-6" role="alert">' . $text . '</div>';
}

/**
 * Construit un message de succ�s
 */
function okMsg($text, $type = 2)
{
    if ($type == 1) {
        return '<p class="text-success">' . $text . '</p>';
    }

    return '<div class="alert alert-success col-md-6" role="alert">' . $text . '</div>';
}


/**
 * Construit un message d'avertissement
 */
function warnMsg($text, $type = 2)
{
    if ($type == 1) {
        return '<p class="text-warning">' . $text . '</p>';
    }
    return '<div class="alert alert-warning col-md-6" role="alert">' . $text . '</div>';
}


/**
 * Construit une liste � puce avec les donn�es d'un tableau
 */
function arrayToUL($array, $class)
{
    $ul = '<ul>';
    foreach ($array as $li) {
        $ul .= '<li class="' . $class . '">' . $li . '</li>';
    }
    $ul .= '</ul>';

    return $ul;
}

