<?php

/*
 * This file is part of the BringApi package.
 *
 * (c) Martin Madsen <crakter@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Crakter\BringApi\Entity;

/**
 * BringApi ShippingGuideEntity
 *
 * An class to supply correct information to Bring Api servers
 *
 * Quick setup: <code>$shippingGuide = (new ShippingGuideEntity)
 *                     ->setFrom('1712')
 *                     ->setTo('0278');</code>
 *
 * @property string $from             This can be set to from postal code
 * @property string $to               This can be set to to postal code
 * @property int $weightInGrams       This can be set to the weight of the package/shipment
 * @property int $width               This can be set to width of package
 * @property int $length              This can be set to length of package
 * @property int $height              This can be set to height of package
 * @property bool $NonStackable       This can be set to false if Stackable, true if not stackable
 * @property string $date             This can be set to date of shipment (format YYYY-MM-DD)
 * @property string $time             This can be set to Time of shipment (ISO format HH:MM)
 * @property string $clientUrl        This can be set to client URL, this does not have to be set if this is supplied through AuthorizationInterface
 * @property bool $edi                This can be set to true if edi is sent, or false if not
 * @property bool $postingAtPostOffice This can be set to true if it is posted at a postal office
 * @property array $additonal         This can set the optional additional services Bring support. Example: [AdditionalProducts::COD, AdditionalProducts::ENOTIFICATION]
 * @property string $priceAdjustments This can be set up the price to a set value (example: m20p = Minus 20 percentage)
 * @property string $pid              This can be set to a unique public id, last part of logged in user of Shipping Guide
 * @property array $product           This can be set to the different products you want to have
 * @property string $customerNumber   This can be set to the specific customer number you want shipping guide from, if only one customer number is applicable for the authorized user it will pick that
 * @property string $language         This can be set to specific language. Example: Languages::NORWEGIAN
 * @property bool $volumeSpecial      This can be set if the package has a shape that may require "special handling fee"
 * @property string $fromCountry      This can be set to from which country it is sent from, default Norway. Example: Countries::NORWAY
 * @property string $toCountry      This can be set to from which country it is sent from, default Norway. Example: Countries::NORWAY
 * @method ApiEntityInterface setFrom(string $string)
 * @method string getFrom()
 * @method ApiEntityInterface setTo(string $string)
 * @method string getTo()
 * @method ApiEntityInterface setWeightInGrams(int $int)
 * @method string getWeightInGrams()
 * @method ApiEntityInterface setWidth(int $int)
 * @method string getWidth()
 * @method ApiEntityInterface setLength(int $int)
 * @method string getLength()
 * @method ApiEntityInterface setHeight(int $int)
 * @method string getHeight()
 * @method ApiEntityInterface setDate(string $string)
 * @method string getDate()
 * @method ApiEntityInterface setTime(string $string)
 * @method string getTime()
 * @method ApiEntityInterface setClientUrl(string $string)
 * @method string getClientUrl()
 * @method ApiEntityInterface setEdi(bool $bool)
 * @method string getEdi()
 * @method ApiEntityInterface setPostingAtPostOffice(bool $bool)
 * @method string getPostingAtPostOffice()
 * @method ApiEntityInterface setPriceAdjustments(string $string)
 * @method string getPriceAdjustments()
 * @method ApiEntityInterface setPid(string $string)
 * @method string getPid()
 * @method array getAdditional()
 * @method array getProduct()
 * @method ApiEntityInterface setCustomerNumber(string $string)
 * @method string getCustomerNumber()
 * @method ApiEntityInterface setLanguage(string $string)
 * @method string getLanguage()
 * @method ApiEntityInterface setVolumeSpecial(bool $string)
 * @method bool getVolumeSpecial()
 * @method ApiEntityInterface setFromCountry(string $string)
 * @method string getFromCountry()
 * @method ApiEntityInterface setToCountry(string $string)
 * @method string getToCountry()
 * @author Martin Madsen <crakter@gmail.com>
 */
class ShippingGuideEntity extends ApiEntityBase implements ApiEntityInterface
{
    /**
     * @var int $counterWeightInGrams Counter of how many packages
     */
    private $counterWeightInGrams = 0;

    /**
     * @var int $counterWidth Counter of how many packages
     */
    private $counterWidth = 0;

    /**
     * @var int $counterHeight Counter of how many packages
     */
    private $counterHeight = 0;

    /**
     * @var int $counterLength Counter of how many packages
     */
    private $counterLength = 0;

    /**
     * @var int $counterVolume Counter of how many packages
     */
    private $counterVolume = 0;

    /**
     * Volume with support for multiple values.
     * @param  int               $int value of Volume per package
     * @return ApiEntityInterface
     */
    public function addVolume(int $volume): ApiEntityInterface
    {
        $name = "volume{$this->counterVolume}";
        $this->{$name} = $volume;
        $this->counterVolume++;

        return $this;
    }

    /**
     * Weight in Grams with support for multiple values.
     * @param  int               $int value of weightInGrams per package
     * @return ApiEntityInterface
     */
    public function addWeightInGrams(int $weightInGrams): ApiEntityInterface
    {
        $name = "weightInGrams{$this->counterWeightInGrams}";
        $this->{$name} = $weightInGrams;
        $this->counterWeightInGrams++;

        return $this;
    }

    /**
     * Width in cm with support for multiple values.
     * @param  int               $int value of width per package
     * @return ApiEntityInterface
     */
    public function addWidth(int $width): ApiEntityInterface
    {
        $name = "weightInGrams{$this->counterWidth}";
        $this->{$name} = $width;
        $this->counterWidth++;

        return $this;
    }

    /**
     * Height in cm with support for multiple values.
     * @param  int               $int value of height per package
     * @return ApiEntityInterface
     */
    public function addHeight(int $height): ApiEntityInterface
    {
        $name = "weightInGrams{$this->counterHeight}";
        $this->{$name} = $height;
        $this->counterHeight++;

        return $this;
    }

    /**
     * Length in cm with support for multiple values.
     * @param  int               $int value of length per package
     * @return ApiEntityInterface
     */
    public function addLength(int $length): ApiEntityInterface
    {
        $name = "weightInGrams{$this->counterLength}";
        $this->{$name} = $length;
        $this->counterLength++;

        return $this;
    }

    /**
     * NonStackable does not follow the camelCase principe so we need this function to be able to set correct.
     * @param  bool               $bool value of NonStackable
     * @return ApiEntityInterface
     */
    public function setNonStackable(bool $bool): ApiEntityInterface
    {
        $this->NonStackable = $bool;

        return $this;
    }

    /**
     * NonStackable does not follow the camelCase principe so we need this function to be able to set correct.
     * @return bool $bool value of NonStackable
     */
    public function getNonStackable(): bool
    {
        return $this->NonStackable;
    }

    /**
     * Sets the additional services
     * @param  array              $args setAdditional(AdditionalProducts::COD, AdditionalProducts::ENOTIFICATION)
     * @return ApiEntityInterface
     */
    public function setAdditional(array ...$args): ApiEntityInterface
    {
        $this->additional = $args;

        return $this;
    }

    /**
     * Sets the products
     * @param  array              $args setProduct(Products::SERVICEPAKKE, Products::SERVICEPAKKE_RETURSERVICE)
     * @return ApiEntityInterface
     */
    public function setProduct(array ...$args): ApiEntityInterface
    {
        $this->product = $args;

        return $this;
    }

    /**
     * Sets correct input format
     * @param  DateTime           $dateTime
     * @return ApiEntityInterface
     */
    public function setDate(\DateTime $dateTime): ApiEntityInterface
    {
        $this->date = $dateTime->format('Y-m-d');

        return $this;
    }

    /**
     * Sets correct input format
     * @param  DateTime           $dateTime
     * @return ApiEntityInterface
     */
    public function setTime(\DateTime $dateTime): ApiEntityInterface
    {
        $this->time = $dateTime->format('H:m');

        return $this;
    }

    /**
     * Add product to the list of products
     * @param  string              $product Products::SERVICEPAKKE
     * @return ApiEntityInterface
     */
    public function addProduct(string $product): ApiEntityInterface
    {
        if(!isset($this->product)) {
            $this->product = [];
        }
        $this->product[] = $product;

        return $this;
    }

    /**
     * Add addtional service to the list of services
     * @param  string              $additional
     * @return ApiEntityInterface
     */
    public function addAdditional(string $additional): ApiEntityInterface
    {
        if(!isset($this->additional)) {
            $this->additional = [];
        }
        $this->additional[] = $additional;

        return $this;
    }
}
