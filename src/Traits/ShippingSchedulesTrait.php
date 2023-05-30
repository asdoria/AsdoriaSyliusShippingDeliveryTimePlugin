<?php

declare(strict_types=1);


namespace Asdoria\SyliusShippingDeliveryTimePlugin\Traits;


use Asdoria\SyliusShippingDeliveryTimePlugin\Model\ShippingScheduleInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class ShippingSchedulesTrait
 * @package Asdoria\SyliusShippingDeliveryTimePlugin\Traits
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
trait ShippingSchedulesTrait
{
    /**
     * @var ShippingScheduleInterface[]|Collection
     */
    protected $shippingSchedules;

    /**
     *
     */
    public function initializeShippingSchedulesCollection(): void
    {
        $this->shippingSchedules = new ArrayCollection();
    }

    /**
     * @return ShippingScheduleInterface[]|Collection
     */
    public function getShippingSchedules(): Collection
    {
        return $this->shippingSchedules;
    }

    /**
     * @param ShippingScheduleInterface[]|Collection $shippingSchedules
     */
    public function setShippingSchedules($shippingSchedules): void
    {
        $this->shippingSchedules = $shippingSchedules;
    }

    /**
     * @param ShippingScheduleInterface $shippingSchedule
     */
    public function addShippingSchedule(ShippingScheduleInterface $shippingSchedule): void {
        if (!$this->hasShippingSchedule($shippingSchedule)) {
            $shippingSchedule->setShippingMethod($this);
            $this->shippingSchedules->add($shippingSchedule);
        }
    }

    /**
     * @param ShippingScheduleInterface $shippingSchedule
     */
    public function removeShippingSchedule(ShippingScheduleInterface $shippingSchedule): void {
        if ($this->hasShippingSchedule($shippingSchedule)) {
            $shippingSchedule->setShippingMethod(null);
            $this->shippingSchedules->removeElement($shippingSchedule);
        }
    }
    /**
     * @param ShippingScheduleInterface $shippingSchedule
     *
     * @return bool
     */
    public function hasShippingSchedule(ShippingScheduleInterface $shippingSchedule): bool
    {
        return $this->shippingSchedules->contains($shippingSchedule);
    }
}