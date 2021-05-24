<?php

namespace zeyroz\kb;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerDropItemEvent;

class Main extends PluginBase implements Listener
{
    /** @var string[] */
    private $config;

    public function onEnable(): void
    {
        $this->config = $this->getConfig()->getAll();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Plugin CustomKB on -> Créer par Zeyroz#1353");
    }

    public function onDamage(EntityDamageByEntityEvent $event) : void
    {
        $entity = $event->getEntity();
        if ($entity instanceof Player) {
            $event->setAttackCooldown($this->config["attackcooldown"]);
            $event->setKnockBack($this->config["knockback"]);
        }
    }
}