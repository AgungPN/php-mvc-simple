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

	public static function setFlashMessageArray(string $typeIcon, array $messages): void
	{
		$_SESSION["flashArray"] = ["type" => $typeIcon, "messages" => (object)$messages];
	}

	public static function getFlashMessageArray(): void
	{
		if (isset($_SESSION["flashArray"])) {
			$alert = $_SESSION["flashArray"];
			$type = $alert["type"];
			$messages = $alert["messages"];

			foreach ($messages as $message) {
				echo "<script>
					Toast.fire({
						icon: '" . $type . "',
						title: '" . $message . "'
				})	
				</script>";
				// echo "<script>console.log('".$message."')</script>";
			}
			unset($_SESSION['flashArray']);
		}
	}
}
