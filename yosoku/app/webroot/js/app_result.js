
function aa(){
  alert('aa');
}
//
function call_jplot(pname , data_1 , data_2 ){
    jQuery . jqplot(
         pname ,
        [
           data_1
           , data_2
        ],
        {
            series: [
                { label: 'jiseki' },
                { label: 'yosoku' },
            ],
            legend: {
                show: true,
                placement: 'outside',
                location: 'ne',
            },
            seriesDefaults: {
                markerOptions: {
                    size: 6
                }
            }            
        }
    ); 
}