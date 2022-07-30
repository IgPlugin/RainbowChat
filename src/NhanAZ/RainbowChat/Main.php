<?php

declare(strict_types=1);

namespace NhanAZ\RainbowChat;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;

class Main extends PluginBase implements Listener {

	protected function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onChat(PlayerChatEvent $event) {
		$message = $event->getMessage();
		$colors = ["§1", "§2", "§3", "§4", "§5", "§6", "§7", "§8", "§9", "§a", "§b", "§c", "§d", "§e", "§f"];

		$split = $split = mb_str_split($message, 1, "UTF-8");

		foreach ($split as $key => $value) {
			$split[$key] = $colors[array_rand($colors)] . $value;
		}

		$event->setMessage(implode("", $split));
	}
}
