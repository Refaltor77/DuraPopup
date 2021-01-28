<?php
namespace DuraPopup;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\item\Tool;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class Popup extends PluginBase implements Listener
{
    public function onEnable()
    {
        Server::getInstance()->getPluginManager()->registerEvents($this, $this);
        Server::getInstance()->getLogger()->info("Plugin enable by refaltor");
    }

    public function onDisable()
    {
        Server::getInstance()->getLogger()->info("Plugin disable by refaltor");
    }

    public function onBreak(BlockBreakEvent $event)
    {
        if ($event->isCancelled()) return;
        $item = $event->getItem();
        if ($item instanceof Tool)
        {
            $player = $event->getPlayer();
            $dura = $item->getMaxDurability();
            $damage = $item->getDamage();
            $total = $dura - $damage;
            $player->sendPopup("§6$total / §r§6" . $dura);
        }
    }



}

