<div class="p-2">
    <table class="font10" width="100%">
        <tbody>
            <tr class="fs-6 text-center">
                <td width="40%"></td>
                <td colspan="8" class="rowColor font10">
                    PERCENT RESPONDING IN EACH OF THE FOLLOWING CATEGORIES
                </td>
            </tr>
            <?php
            $json = file_get_contents('./data.json');
            $data = json_decode($json);
            $html = file_get_contents('./comps/tableHeaders.php');
            $dom = new DOMDocument();
            $dom->loadHTML($html);

            $row_index = 0;
            $current_category = null;
            $current_header = 0;
            foreach ($data as $row) {
                if ($row->category != $current_category) {
                    if ($current_header != 0 && $row->header_num != 2) {
                        echo "<tr class='fs-6 text-center'>	
                    <td class='rowColor'>" . $row->category . "</td>
                    <td colspan='8' class='rowColor'></td>
                    </tr>";
                    }
                    $current_category = $row->category;
                }
                if ($row->header_num != $current_header) {
                    if ($row->header_num == 1)
                        $div = $dom->getElementById('header1');
                    else if ($row->header_num == 2)
                        $div = $dom->getElementById('header2');
                    else if ($row->header_num == 3)
                        $div = $dom->getElementById('header3');
                    else if ($row->header_num == 4)
                        $div = $dom->getElementById('header4');
                    $div_html = $dom->saveHTML($div);
                    echo $div_html;
                    $current_header = $row->header_num;
                }

                $row_class = $row_index % 2 == 0 ? 'row-bg-color text-center' : 'text-center';
                echo "<tr class=\"$row_class\">
                <td class='text-start'>" . $row->question . "</td>
                <td>" . $row->median . "</td>
                <td>" . $row->strongly_agree . "</td>
                <td>" . $row->agree . "</td>
                <td>" . $row->neutral . "</td>
                <td>" . $row->disagree . "</td>
                <td>" . $row->strongly_disagree . "</td>
                <td>" . $row->not_answered . "</td>
                <td>" . $row->unable . "</td>
                </tr>";
                $row_index++;
            }
            ?>
        </tbody>
    </table>
</div>