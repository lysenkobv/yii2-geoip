<?php


namespace lysenkobv\GeoIP;

/**
 * Class Result
 * @package lysenkobv\GeoIP
 *
 * @property string|null $city
 * @property string|null $country
 * @property Location $location
 * @property string|null $isoCode
 */
class Result extends ResultBase {
    protected function getCity($data) {
        $value = null;

        if (isset($data['city']['names']['en'])) {
            $value = $data['city']['names']['en'];
        }

        return $value;
    }

    protected function getCountry($data) {
        $value = null;

        if (isset($data['country']['names']['en'])) {
            $value = $data['country']['names']['en'];
        }

        return $value;
    }

    protected function getLocation($data) {
        $value = new Location();

        if (isset($data['location'])) {
            $lat = $data['location']['latitude'];
            $lng = $data['location']['longitude'];
            $value = new Location($lat, $lng);
        }

        return $value;
    }

    protected function getIsoCode($data) {
        $value = null;

        if (isset($data['country']['iso_code'])) {
            $value = $data['country']['iso_code'];
        }

        return $value;
    }

    public function isDetected() {
        return ($this->location->lat !== null && $this->location->lng !== null);
    }
}
