<?php
$json = file_get_contents('./info.json');
$data = json_decode($json);
foreach ($data as $row) {
echo
"<div class= 'p-2'>
    <table class='font10 table text-center' width='100%' >
                <tbody>
                  <tr class='rowColor'>
                    <td  width='25%'>
                      <b>Instructor: </b><br>"
                    . $row->instructor .
                    "</td>
                    <td  width='25%'>
                      <b>Course: </b><br>"
                    . $row->course .
                    "</td>
                    <td  width='25%'>
                      <b>Call No.: </b><br>"
                    . $row->call_no .
                    "</td>
                    <td  width='25%'>
                      <b>Students Responding: </b> <br>"
                    . $row->responses . " of "
                    . $row->student_count .
                    "</td>
                </tr>
                </tbody>
    </table>
  </div>
";
}
?>
