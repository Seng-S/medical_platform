<?php
require_once 'implements/PdoClientManager.php';
require_once 'implements/PdoClientAppointmentManager.php';
require_once 'implements/PdoDoctorManager.php';
require_once 'implements/PdoDoctorDetailManager.php';
require_once 'implements/PdoDoctorAppointmentManager.php';
require_once 'implements/PdoDoctorAddressManager.php';
require_once 'implements/PdoDoctorWorkingHourManager.php';
require_once 'implements/PdoDoctorUnavailabilityManager.php';
require_once 'implements/PdoDoctorSpecializationManager.php';
require_once 'implements/PdoSpecializationManager.php';
require_once 'implements/PdoAppointmentManager.php';
require_once 'implements/PdoScheduleManager.php';

final class ManagerFactory {
    public static function getClientManager() {
		return new PdoClientManager();
	}

	public static function getClientAppointmentManager() {
		return new PdoClientAppointmentManager();
	}

	public static function getDoctorManager() {
		return new PdoDoctorManager();
	}

	public static function getDoctorDetailManager() {
		return new PdoDoctorDetailManager();
	}

	public static function getDoctorAppointmentManager() {
		return new PdoDoctorAppointmentManager();
	}

	public static function getDoctorAddressManager() {
		return new PdoDoctorAddressManager();
	}

	public static function getDoctorWorkingHourManager() {
		return new PdoDoctorWorkingHourManager();
	}

	public static function getDoctorUnavailabilityManager() {
		return new PdoDoctorUnavailabilityManager();
	}

	public static function getDoctorSpecializationManager() {
		return new PdoDoctorSpecializationManager();
	}

	public static function getSpecializationManager() {
		return new PdoSpecializationManager();
	}

	public static function getAppointmentManager() {
		return new PdoAppointmentManager();
	}

	public static function getScheduleManager() {
		return new PdScheduleManager();
	}

}

?>