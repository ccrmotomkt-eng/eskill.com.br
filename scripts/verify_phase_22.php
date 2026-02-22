<?php
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use App\Database;
use App\Services\ShopeeService;

echo "=============================================\n";
echo "   🛒️ TESTE SHOPEE INTEGRATION (PHASE 22) \n";
echo "=============================================\n";

$db = Database::getInstance();
$service = new ShopeeService();

// 1. Sync from API (real)
echo "Fetching items from Shopee API...\n";
$items = $service->getItems();
echo "Found " . count($items) . " items from Shopee API.\n";

if (count($items) > 0) {
    $firstItem = $items[0];
    echo "✅ Item 1: " . ($firstItem['item_name'] ?? 'N/A') . " - Price: " . ($firstItem['price_info']['current_price'] ?? 'N/A') . "\n";
    echo "✅ SUCESSO: Integração Shopee (Base) funcional.\n";
} else {
    echo "⚠️ Nenhum item encontrado. Verifique se há conta Shopee autenticada.\n";
}
