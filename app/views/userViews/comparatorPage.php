<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/CarLog/app/views/sharedViews/sharedViews.php");
class ComparatorPage
{
    public function showPage()
    {
        $shardViews = new SharedViews();
        $shardViews->showHeader();
        echo 'ComparatorPage';
        //$this->showComparator();
        $shardViews->showFooter();
    }

    private function showComparator()
    {
        $brandController = new BrandController();
        $brands = $brandController->getAllBrands();

        ?>
        <div>
            <form>
                <div>
                    <select name="brand" id="brandSelect" onchange="enableModelSelect()">
                        <?php foreach ($brands as $brand) { ?>
                            <option value="<?php echo $brand['id']; ?>">
                                <?php echo $brand['name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <select name="model" id="modelSelect" disabled onchange="enableYearSelect()">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="fiat">Fiat</option>
                        <option value="audi">Audi</option>
                    </select>
                </div>
                <div>
                    <select name="year" id="yearSelect" disabled>
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="fiat">Fiat</option>
                        <option value="audi">Audi</option>
                    </select>
                </div>
            </form>
        </div>

        <script>
            function enableModelSelect() {
                var brandSelect = document.getElementById("brandSelect");
                var modelSelect = document.getElementById("modelSelect");
                var yearSelect = document.getElementById("yearSelect");

                modelSelect.disabled = false;
                yearSelect.disabled = true;
            }
            function enableYearSelect() {
                var brandSelect = document.getElementById("brandSelect");
                var modelSelect = document.getElementById("modelSelect");
                var yearSelect = document.getElementById("yearSelect");

                yearSelect.disabled = false;
            }
        </script>
        <?php
    }
}
