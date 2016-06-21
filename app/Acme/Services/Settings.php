<?php 
namespace App\Acme\Services;


/**
 * Settings class to easy manage user settings json data
 */
class Settings
{

	protected $model, $settings;


	public function __construct($model, $settings_attribute)
	{
		$this->model = $model;
		$this->attribute = $settings_attribute;
		$this->settings = $this->model->getAttribute($this->attribute);
	}


	/**
	 * Sets a key/value in the settings
	 * 
	 * @param type $key 
	 * @param type $value 
	 * @return type
	 */
	public function set($key, $value)
	{
		array_set($this->settings, $key, $value);
		$this->persist();
	}


	/**
	 * Get a key from the settings
	 * 
	 * @param type $key 
	 * @return type
	 */
	public function get($key)
	{
		if(!array_has($this->settings, $key))
			return null;

		return array_get($this->settings, $key);
	}


	/**
	 * Return all the settings
	 * 
	 * @return type
	 */
	public function all()
	{
		return $this->settings;
	}


	/**
     * Save the settings.
     *
     * @return mixed
     */
    protected function persist()
    {
        return $this->model->update([$this->attribute => $this->settings]);
    }

}

?>