<?php


class WebFormHelper
{
    private $arResult;
    private $rand;
    private $questions;
    private $result;

    private $mobile;
    private $hideIcon;

    private $question;
    private $sid;

    private $SITE_TEMPLATE_PATH;

    public function __construct($arResult, $template_PATH, $mobile = false, $hideIcon = false)
    {
        $this->rand = rand(0, 1000);
        $this->arResult = $arResult;
        $this->questions = $arResult['QUESTIONS'];

        $this->mobile = $mobile;
        $this->hideIcon = $hideIcon;

        $this->SITE_TEMPLATE_PATH = $template_PATH;
    }

    public function getFields()
    {
        if (!count($this->questions))
            return false;

        foreach ($this->questions as $sid => $question) {
            $this->question = $question;
            $this->sid = $sid;

            $this->getField();
            $this->result .= $this->question["HTML_CODE"];
        }
        return $this->result;
    }

    private function getField()
    {
        if ($this->question['STRUCTURE'][0]['FIELD_TYPE'] == 'text')
            $this->getText();

        if ($this->question['STRUCTURE'][0]['FIELD_TYPE'] == 'checkbox')
            $this->getCheckbox();

        $this->checkHWrapper();
    }

    private function getCheckbox()
    {
        $this->checkComment();
        $this->setCheckbox();
        $this->getCheckboxWrapper();
    }
    private function getText()
    {
        $this->setPlaceholder();
        $this->checkComment();
        $this->getError();
        $this->getFieldWrapper();
    }

    private function checkComment()
    {
        if (strpos($this->arResult['arQuestions'][$this->sid]['COMMENTS'], 'NAME') !== false) {
            $this->commentName();
        }
        if(strpos($this->arResult['arQuestions'][$this->sid]['COMMENTS'], 'PHONE') !== false) {
            $this->commentPhone();
        }
        if (strpos($this->arResult['arQuestions'][$this->sid]['COMMENTS'], 'M=HIDE') !== false && $this->mobile) {
            $this->commentMHide();
        }
        if (strpos($this->arResult['arQuestions'][$this->sid]['COMMENTS'], 'M=AUTOCHECK') !== false && $this->mobile) {
            $this->commentAutoCheck();
        }
    }

    private function commentPhone()
    {
        $this->setPhoneSvg();

        $this->question["HTML_CODE"] =
            str_replace('<input',
                "<input data-mask=\"". COption::GetOptionString("askaron.settings", "UF_PHONE_MASK") ."\"",
                $this->question["HTML_CODE"]
            );

        $this->question["HTML_CODE"] =
            str_replace('<input',
                "<input id='$this->rand{$this->arResult['arQuestions'][$this->sid]['ID']}{$this->arResult['arForm']['SID']}'",
                $this->question["HTML_CODE"]
            );

        $this->question['HTML_CODE'] .=
            "<script>
                $(document).ready(function(){
                    $('#".$this->rand.$this->arResult['arQuestions'][$this->sid]['ID'].$this->arResult['arForm']['SID']."')
                        .mask('". COption::GetOptionString('askaron.settings', 'UF_PHONE_MASK')."');
                })
            </script>";

    }
    private function commentName()
    {
        $this->setUserSvg();
    }
    private function commentMHide()
    {
        $this->question["HIDE_ALL"] = true;
    }
    private function commentAutoCheck()
    {
        $this->question["HTML_CODE"] =
            str_replace('<input',
                "<input checked ",
                $this->question["HTML_CODE"]
            );
    }

    private function setPlaceholder()
    {
        $this->question["HTML_CODE"] =
            str_replace('<input',
                "<input placeholder='{$this->question["CAPTION"]}' ",
                $this->question["HTML_CODE"]
            );
    }
    private function setCheckbox()
    {
        $this->question["HTML_CODE"] =
            str_replace('<input',
                "<input class='checkbox' ",
                $this->question["HTML_CODE"]
            );

        $this->question["HTML_CODE"] =
            str_replace('<label for="'.$this->arResult['arQuestions'][$this->sid]['ID'].'"> </label>',
                " ",
                $this->question["HTML_CODE"]
            );

        $this->question["HTML_CODE"] =
            str_replace('id="'.$this->arResult['arQuestions'][$this->sid]['ID'].'"',
                'id="checkbox-'.$this->rand.$this->arResult['arQuestions'][$this->sid]['ID'].$this->arResult['arForm']['SID'].'" ',
                $this->question["HTML_CODE"]
            );

    }

    private function getError($getStr = false)
    {
        if (is_array($this->arResult["FORM_ERRORS"]) && array_key_exists($this->sid, $this->arResult['FORM_ERRORS'])) {
            if ($getStr)
                return '<span role="alert" class="wpcf7-not-valid-tip">'.$this->arResult["FORM_ERRORS"][$this->sid].'</span>';

            $this->question["HTML_CODE"] .= '<span role="alert" class="wpcf7-not-valid-tip">'.$this->arResult["FORM_ERRORS"][$this->sid].'</span>';
        }
        return false;
    }

    private function getCheckboxWrapper()
    {
        $this->question["HTML_CODE"] =
        '<div class="form-group checkbox-group">
            <span class="wpcf7-form-control-wrap">
                <label for="checkbox-'.$this->rand.$this->arResult['arQuestions'][$this->sid]['ID'].$this->arResult['arForm']['SID'].'">
                    '.$this->question["HTML_CODE"].'
                    <span class="checkbox-custom "></span>
                    <span class="label">'.$this->question["CAPTION"].'</span>
                </label>
                '.$this->getError(true).'
            </span>
        </div>';
    }
    private function getFieldWrapper()
    {
        $this->question["HTML_CODE"] =
        '<div class="form-group">
            <span class="wpcf7-form-control-wrap">
                '.$this->question["HTML_CODE"].'
            </span>
        </div>';
    }

    private function checkHWrapper()
    {
        if (isset($this->question['HIDE_ALL']) && $this->question['HIDE_ALL'] === true) {
            $this->question["HTML_CODE"] =
                '<div style="display: none; margin: 0; padding: 0; position: absolute; left: -9900px">
                    '.$this->question["HTML_CODE"].'
                </div>';
        }
    }

    private function setPhoneSvg()
    {
        if (!$this->hideIcon) {
            $this->question["HTML_CODE"] =
                "<svg class=\"icon-svg icon-svg-phone-call \">
                <use xlink:href=\"". $this->SITE_TEMPLATE_PATH . '/img/sprite.svg#phone-call' ."\"></use>
            </svg>".$this->question["HTML_CODE"];
        }
    }
    private function setUserSvg()
    {
        if (!$this->hideIcon) {
            $this->question["HTML_CODE"] =
                "<svg class=\"icon-svg icon-svg-user \">
                <use xlink:href=\"". $this->SITE_TEMPLATE_PATH . '/img/sprite.svg#user' ."\"></use>
            </svg>".$this->question["HTML_CODE"];
        }
    }
}
