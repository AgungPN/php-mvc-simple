<?php

namespace App\Core;

/** @author Agung Prasetyo Nugroho <agungpn33@gmail.com> */
class FlashMessage
{
	public static function setFlashMessage(string $typeIcon, string $message, ?string $title = null): void
	{
		if (is_null($title)) $title = $typeIcon;
		$_SESSION["flash"] = (object)["type" => $typeIcon, "message" => $message, "title" => $title];
	}

	public static function getFlashMessage(): void
	{
		if (isset($_SESSION["flash"])) {
			$alert = $_SESSION["flash"];
			echo "<script>
			Swal.fire({
				title: '" . $alert->title . "',
				text: '" . $alert->message . "',
				icon: '" . $alert->type . "'
			})
			</script>";
			unset($_SESSION["flash"]);
		}
	}
}
