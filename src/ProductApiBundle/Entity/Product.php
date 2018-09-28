<?php

namespace ProductApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="ProductApiBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="product_sku", type="string", length=255)
     */
    private $productSku;

    /**
     * @var string
     *
     * @ORM\Column(name="product_detail", type="string", length=255)
     */
    private $productDetail;

    /**
     * @var string
     *
     * @ORM\Column(name="product_price", type="decimal", precision=10, scale=0)
     */
    private $productPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="product_currency", type="string", length=255)
     */
    private $productCurrency;

    /**
     * @var datetime $createAt
     *
     * @ORM\Column(type="datetime")
     */
    protected $createAt;

    /**
     * @return datetime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * @param datetime $createAt
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;
    }

    /**
     * @var datetime $updated
     *
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * @return datetime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set productSku
     *
     * @param string $productSku
     *
     * @return Product
     */
    public function setProductSku($productSku)
    {
        $this->productSku = $productSku;

        return $this;
    }

    /**
     * Get productSku
     *
     * @return string
     */
    public function getProductSku()
    {
        return $this->productSku;
    }

    /**
     * Set productDetail
     *
     * @param string $productDetail
     *
     * @return Product
     */
    public function setProductDetail($productDetail)
    {
        $this->productDetail = $productDetail;

        return $this;
    }

    /**
     * Get productDetail
     *
     * @return string
     */
    public function getProductDetail()
    {
        return $this->productDetail;
    }

    /**
     * Set productPrice
     *
     * @param string $productPrice
     *
     * @return Product
     */
    public function setProductPrice($productPrice)
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    /**
     * Get productPrice
     *
     * @return string
     */
    public function getProductPrice()
    {
        return $this->productPrice;
    }

    /**
     * Set productCurrency
     *
     * @param string $productCurrency
     *
     * @return Product
     */
    public function setProductCurrency($productCurrency)
    {
        $this->productCurrency = $productCurrency;

        return $this;
    }

    /**
     * Get productCurrency
     *
     * @return string
     */
    public function getProductCurrency()
    {
        return $this->productCurrency;
    }
}

