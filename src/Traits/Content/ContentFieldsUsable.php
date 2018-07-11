<?php


namespace Webmagic\Dashboard\Traits\Content;


use Webmagic\Dashboard\Contracts\Renderable;
use Webmagic\Dashboard\Elements\SimpleStringElement;

trait ContentFieldsUsable
{
    /** @var  array Sections available in pag   e */
//     protected $available_fields = [
//         'name' => [
//              'type' => '' //string, bool, Renderable
//              'default' => $value, //default value
//              'acceptable_values' => [] //array of available values
//         ]
//     ];

    /** @var  string Default section for current page */
//    protected $default_field;

    /** @var array Available for set field types */
    private $available_field_types = [
        'string',
        'bool',
        'renderable',
        'any'
    ];

    /** @var  array */
    protected $fields_content;

    /**
     * ContentFieldsUsable constructor.
     *
     * @param null $content
     */
    public function __construct($content = null)
    {
        if (!is_null($content)) {
            $this->content($content);
        }
    }

    /**
     * Set or get field value
     *
     * @param string $param_name
     * @param null   $value
     *
     * @return mixed
     * @throws ContentTypeException
     * @throws FieldNotDefined
     * @throws FieldUnavailable
     * @throws \Exception
     */
    public function param(string $param_name, $value = null)
    {
        //Exception if not valid
        $this->validateFieldName($param_name);

        if (is_null($value)) {
            return $this->getFieldValue($param_name);
        }

        return $this->setFieldContent($value, $param_name);
    }

    /**
     * Set content to default section or get value of default field
     *
     * @param string|Renderable|array $content
     *
     * @return mixed
     * @throws ContentTypeException
     * @throws FieldNotDefined
     * @throws \Exception
     */
    public function content($content = null)
    {
        if (is_null($content)) {
            return $this->getDefaultFieldContent();
        }

        if (!is_array($content)) {
            return $this->setFieldContent($content);
        }

        foreach ($content as $field_name => $field_content) {
            $this->setFieldContent($field_content, $field_name);
        }
    }

    /**
     * Get value for default field
     *
     * @return string
     */
    protected function getDefaultFieldContent()
    {
        $field_name = $this->getDefaultField();
        return $this->getFieldValue($field_name);
    }

    /**
     * Set content to field
     *
     * @param string|Renderable $content
     * @param string|null       $name
     *
     * @return mixed
     * @throws ContentTypeException
     * @throws FieldNotDefined
     * @throws \Exception
     *
     */
    protected function setFieldContent($content, string $name = null)
    {
        //Use default section if section name is unknown
        if (is_null($name)) {
            $name = $this->getDefaultField();
        }

        //We will have exception here if value is not valid
        $this->isFieldValid($name, $content);

        //Check if we have defined method for set param
        $method = $this->prepareAttributeSetMethod($name);
        if (method_exists($this, $method)) {
            return $this->{$method}($content);
        }

        //All are valid and we may define value
        $this->{$name} = $content;
    }

    /**
     * Add value to current
     * May be used for prepend or for push
     *
     * @param             $content
     * @param string|null $name
     *
     * @param bool        $prepend
     *
     * @return array
     */
    public function addFieldContent($content, string $name = null, $prepend = false)
    {
        //Use default section if section name is unknown
        if (is_null($name)) {
            $name = $this->getDefaultField();
        }

        //We will have exception here if value is not valid
        $this->isFieldValid($name, $content);

        $current_value = $this->{$name};
        //Just set value if it was empty before
        if (empty($current_value)) {
            return $this->{$name} = $content;
        }

        //Add item to array if it was array before
        if (is_array($current_value)) {
            return $this->{$name} = $prepend ? array_prepend($current_value, $content) : array_push($array, $current_value);
        }

        //Create array and add item if item was set before but it is not array
        return $this->{$name} = $prepend ? [$current_value, $content] : [$content, $current_value];
    }

    /**
     * Validate field and value
     *
     * @param $name
     * @param $value
     *
     * @return bool
     * @throws \Exception
     */
    protected function isFieldValid($name, $value)
    {
        //Validate field name
        $this->validateFieldName($name);

        //Validate field value
        //We will have exception here if value is not valid
        $this->validateFieldValue($name, $value);

        return true;
    }

    /**
     * Validate field name and return exception if it not valid
     *
     * @param $name
     *
     * @throws FieldUnavailable
     */
    protected function validateFieldName($name)
    {
        if (!$this->isFieldAvailable($name)) {
            throw new FieldUnavailable($name, $this);
        }
    }

    /**
     * Return default section
     *
     * @return mixed
     */
    public function getDefaultField()
    {
        if (isset($this->default_field)) {
            return $this->default_field;
        }

        //Will return exception if no one fields defined
        $available_fields = $this->getAvailableFields();

        return array_shift($available_fields);
    }

    /**
     * Check if field is available
     *
     * @param string $field_name
     *
     * @return bool
     */
    protected function isFieldAvailable(string $field_name)
    {
        $available_fields = $this->getAvailableFields();

        if (key_exists($field_name, $available_fields)) {
            return true;
        }

        if (in_array($field_name, $available_fields)) {
            return true;
        }

        return false;
    }

    /**
     * Validate if field type is valid
     *
     * @param string $name
     * @param        $value
     *
     * @return bool
     */
    protected function validateFieldValue(string $name, $value)
    {
        $type = $this->getFieldType($name);

        //We will have exception here if value is not valid
        $this->{'isValid' . $type . 'Value'}($name, $value);

        //We will have exception here if value is not unacceptable
        $this->isFieldValueAcceptable($name, $value);

    }

    /**
     * Check if field is acceptable
     *
     * @param string $name
     * @param        $value
     *
     * @return bool
     * @throws \Exception
     */
    protected function isFieldValueAcceptable(string $name, $value)
    {
        $available_fields = $this->getAvailableFields();
        if (!isset($available_fields[$name]['acceptable_values'])) {
            return true;
        }

        if (in_array($value, $available_fields[$name]['acceptable_values'])) {
            return true;
        }

        throw new UnacceptableValueException($value, $name, get_class($this));
    }

    /**
     * validate value for string param
     *
     * @param string $field_name
     * @param        $value
     *
     * @return mixed
     * @throws \Exception
     */
    protected function isValidStringValue(string $field_name, $value)
    {
        if (!is_string($value)) {
            throw new FieldNotValidException($field_name, gettype($value), 'string', get_class($this));
        }

        return true;
    }

    /**
     * Validate bool value
     *
     * @param string $field_name
     * @param        $value
     *
     * @return bool
     * @throws \Exception
     */
    protected function isValidBoolValue(string $field_name, $value)
    {
        if (!is_bool($value)) {
            throw  new FieldNotValidException($field_name, gettype($value), 'bool', get_class($this));
        }

        return true;
    }

    /**
     * Validate bool value
     *
     * @param string $field_name
     * @param        $value
     *
     * @return bool
     * @throws \Exception
     */
    protected function isValidRenderableValue(string $field_name, $value)
    {
        if (!is_object($value)) {
            throw new FieldNotValidException($field_name, gettype($value), Renderable::class, get_class($this));
        }

        $interfaces = class_implements($value);
        if (in_array(Renderable::class, $interfaces)) {
            throw new FieldNotValidException($field_name, gettype($value), Renderable::class, get_class($this));
        }

        return true;
    }

    /**
     * Validate any value
     *
     * @param string $field_name
     * @param        $value
     *
     * @return bool
     * @throws \Exception
     */
    protected function isValidAnyValue(string $field_name, $value)
    {
        return true;
    }

    /**
     * Get set type for field
     *
     * @param string $fieldName
     *
     * @return string
     * @throws NoOneFieldsWereDefined
     * @throws \Exception
     */
    protected function getFieldType(string $fieldName)
    {
        $availableFields = $this->getAvailableFields();

        //Use type 'string' if nothing defined or type not defined
        if (!isset($availableFields[$fieldName]['type'])) {
            return 'any';
        }

        $set_type = $availableFields[$fieldName]['type'];
        if (!in_array($set_type, $this->available_field_types)) {
            throw new \Exception("Type $set_type defined in" . get_class($this) . " is not support in trait");
        }

        return $set_type;
    }

    /**
     * Return array with prepared content for render view
     * based on sections names
     *
     * @return array
     */
    protected function prepareContentsForFields()
    {
        $this->fields_content = [];
        $available_fields = $this->getAvailableFields();
        foreach ($available_fields as $field_name => $field_data) {
            if (is_array($field_data)) {
                $this->prepareFieldValue($field_name);
            } else {
                $this->prepareFieldValue($field_data);
            }
        }

        return $this->fields_content;
    }

    /**
     * Convert object to array
     *
     * @return array
     */
    public function toArray()
    {
        return $this->prepareContentsForFields();
    }

    /**
     * Prepare field value and set it
     *
     * @param string $name
     *
     * @return string
     */
    protected function prepareFieldValue(string $name)
    {
        $value = $this->getFieldValue($name);
        return $this->fields_content[$name] = $this->prepareValue($value);
    }

    /**
     * Prepare value
     *
     * @param $value
     *
     * @return string
     */
    protected function prepareValue($value)
    {
        //Render if it is renderable value
        if ($value instanceof Renderable) {
            return $value->render();
        }

        //Recursion for prepare values for array
        if (is_array($value)) {
            $result_value = '';
            foreach ($value as $item) {
                $result_value .= $this->prepareValue($item);
            }
        }

        return $value;
    }

    /**
     * Get field value
     *
     * @param string $name
     *
     * @return string
     */
    protected function getFieldValue(string $name)
    {
        //Result of method if exists
        $method = $this->prepareAttributeGetMethod($name);
        if (method_exists($this, $method)) {
            return $this->{$method}();
        }

        //Value of param if exists
        if (isset($this->{$name})) {
            return $this->{$name};
        }

        return $this->getFieldDefaultValue($name);
    }

    /**
     * Prepare attribute set method
     *
     * @param $attr_name
     *
     * @return string
     */
    protected function prepareAttributeSetMethod($attr_name)
    {
        return 'set' . ucfirst(camel_case($attr_name));
    }

    /**
     * Prepare attribute get method
     *
     * @param $attr_name
     *
     * @return string
     */
    protected function prepareAttributeGetMethod($attr_name)
    {
        return 'get' . ucfirst(camel_case($attr_name));
    }

    /**
     * @param string $field_name
     *
     * @return mixed
     */
    protected function getFieldDefaultValue(string $field_name)
    {
        $available_fields = $this->getAvailableFields();

        //Return default if it is set
        if (!in_array($field_name, $available_fields) && isset($available_fields[$field_name]['default'])) {
            return $available_fields[$field_name]['default'];
        }

        $type = $this->getFieldType($field_name);

        //Default value if renderable type
        if ($type == 'renderable') {
            return new SimpleStringElement('');
        }

        //Default value if string
        if ($type == 'string') {
            return '';
        }

        //Default for bool
        if ($type == 'bool') {
            return false;
        }

        //Default for 'any' and if type undefined
        return '';
    }

    /**
     * Return available section oin current page
     * @return array
     * @throws NoOneFieldsWereDefined
     */
    public function getAvailableFields()
    {
        if (isset($this->available_fields) and count($this->available_fields) > 0) {
            return $this->available_fields;
        }

        throw new NoOneFieldsWereDefined($this);
    }
}