<?php
declare(strict_types=1);

namespace arie\reddust;

use pocketmine\block\Block;
use pocketmine\block\BlockFactory;
use pocketmine\block\VanillaBlocks;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

use arie\reddust\block\Hopper;
use arie\reddust\listener\ItemEntityListener;

final class Loader extends PluginBase {

    private static self $instance;


    /** @var ItemEntityListener */
    private $item_entity_listener;

    protected function onLoad() : void {
        self::$instance = $this;
        $hopper = VanillaBlocks::HOPPER();
        BlockFactory::getInstance()->register(new Hopper($hopper->getIdInfo(), $hopper->getName(), $hopper->getBreakInfo()), true);
    }

    public static function getInstance() : self {
        return self::$instance;
    }

    protected function onEnable() : void {
        $this->getLogger()->info("Nothing here to see you silly!");
        $this->item_entity_listener = new ItemEntityListener($this);
    }
}