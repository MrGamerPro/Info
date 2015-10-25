<?php

namespace Info;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player;
use pocketmine\utils\TextFormat;
use pocketmine\level\sound\ClickSound;

class Main extends PluginBase {
    
    public function onEnable() {
    $this->getLogger()->info(TextFormat::GREEN . "Plugin Enabled!");
    }
    public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
        if($sender instanceof $player) {
            $name = $sender->getName();
            if(strtolower($command->getName()) === 'info') {
                if(count($args) < 1) {
                   $level = $sender->getLevel();
                   $level->addSound(new ClickSound($sender->getLocation()));
                   $sender->sendMessage("Info \n1.Test\n2. Test2");
                   $sender->sendTip("You are running the INFO command...");
                   return;
                } else {
                      $sender->sendMessage("this command requires nothing");
                     return;
                }
            }
        }
        $sender->sendMessage("You must run this cmd on game not on console bb");
        return;
    }
}

