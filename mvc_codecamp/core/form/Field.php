<?php

    namespace app\core\form;

    use app\core\Model;

    /**
     * Class Field
     * 
     * @package app\core\form
     */

    class Field 
    {

        public const TYPE_TEXT = 'text';
        public const TYPE_EMAIL = 'email';
        public const TYPE_NUMBER = 'number';
        public const TYPE_PASSWORD = 'password';
 

        public string $type;
        public Model $model;
        public string $attribute;

        public function __construct(Model $model, $attribute) {
            $this->type = self::TYPE_TEXT;
            $this->model = $model;
            $this->attribute = $attribute;
        }      

        public function __toString()
        {
            return sprintf('
                    <div class="form-group">
                        <label class="form-label">%s</label>
                        <input type="%s" name="%s" value="%s" class="form-control%s">
                        <div class="invalid-feedback">
                            %s
                        </div>
                    </div>
                ', 
                    ucwords($this->model->getLabel($this->attribute)) . ": ",
                    $this->type,
                    $this->attribute,
                    $this->model->{$this->attribute},
                    $this->model->hasError($this->attribute) ? ' is-invalid' : '',
                    $this->model->getFirstError($this->attribute)
            );
        }

        public function password() {
            $this->type = self::TYPE_PASSWORD;
            return $this;
        }

    }
