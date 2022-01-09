<?php
/*
 *
 *  * @author Coskun Baltaci
 *  * @copyright Copyright (c) 2022 "Coskun Baltaci"
 *
 */

namespace Coskun\NewsletterSubscriberInfo\Api;


interface ConfigInterface
{
    /**
     * @param null $storeViewCode
     * @return string|null
     */
    public function getStatus(string $storeViewCode = null): ?string;

    /**
     * @param null $storeViewCode
     * @return string|null
     */
    public function getFirstnameFieldStatus(string $storeViewCode = null): ?string;

    /**
     * @param null $storeViewCode
     * @return string|null
     */
    public function getFirstnameFieldLabel(string $storeViewCode = null): ?string;

    /**
     * @param null $storeViewCode
     * @return string|null
     */
    public function getLastnameFieldStatus(string $storeViewCode = null): ?string;

    /**
     * @param null $storeViewCode
     * @return string|null
     */
    public function getLastnameFieldLabel(string $storeViewCode = null): ?string;

    /**
     * @param null $storeViewCode
     * @return string|null
     */
    public function getEmailFieldLabel(string $storeViewCode = null): ?string;

    /**
     * @param null $storeViewCode
     * @return string|null
     */
    public function getSubmitButtonLabel(string $storeViewCode = null): ?string;

}
