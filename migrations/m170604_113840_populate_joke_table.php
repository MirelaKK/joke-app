<?php

use yii\db\Migration;

class m170604_113840_populate_joke_table extends Migration
{
    public function up()
    {
        // active column can take values 0 for false and 1 for true
        $this->batchInsert('joke', ['title', 'joke', 'submit_date', 'submitter', 'status_id', 'approval_date', 
            'admin_id', 'joke_of_day_date', 'rating'], [
                ['Sretna porodica', 'Da bi jedna porodica bila srećna, mora da postoji ljubav, razumevanje i najmanje dva kompjutera!',
                '2017-06-04 10:16:34', 'Admin Jedan', 2, '2017-06-04 10:16:34', 1, NULL, NULL],
                ['USB', 'Dodje kompjuteraš u mesaru i kaže: - Dajte mi 100 grama salame. - Da vam narežem? - Ma jok, prebaci mi na USB!',  
                '2017-06-04 11:41:33', 'Admin Jedan', 2, '2017-06-04 11:41:33', 1, NULL, NULL], 
                ['Saučešće', 'Kako programer izjavljuje saučešće? -Primi moju tehničku podršku...',  
                '2017-06-04 11:37:22', 'Admin Jedan', 2, '2017-06-04 11:37:22', 1, NULL, NULL], 
                ['Dva psa', 'Idu dva psa, jedan se češka, a drugi Slovačka.',  
                '2017-06-04 10:16:32', 'Admin Jedan', 2, '2017-06-04 10:16:32', 1, NULL, NULL], 
                ['Cvrčak i mrav', 'Dok je mrav preko ljeta vrijedno sakupljao hranu za zimu, cvrčak je pjevao i zabavljao se. 
                Kad je došla zima, mrav se smjestio u svoj skromni dom, a cvrčak se prijavio na Zvezde Granda i dobio stan u Beogradu, 
                automobil i snimanje albuma. Mrav se objesio o djetelinu.',  
                '2017-06-04 10:00:00', 'Admin Jedan', 2, '2017-06-04 10:00:00', 1, NULL, NULL],
                ['Nema više..', '-Moj muž više ne pije, ne ide po kafanama, ne juri ženske.. -Stvarno? Kad je prestao?',  
                '2017-06-04 11:21:50', 'Admin Jedan', 2, '2017-06-04 11:21:50', 1, NULL, NULL],
                ['San', 'Sanjao sam da nemam ni prebijene pare i ujutro, čim sam se probudio, san se ostvario! 
                Ne odustajte od svojih snova!',  
                '2017-06-04 12:03:47', 'Admin Jedan', 2, '2017-06-04 12:03:47', 1, NULL, NULL],
                ['Robot za hvatanje lopova', 'Japanci napravili robota koji prepoznaje i hvata lopove. 
                Prvi dan ga odnesu u Vašington i robot za jedan dan nahvata 100 lopova. 
                Drugi dan ga odnesu u Brisel i tamo za pola dana nahvata 200 lopova. Treći dan ga donesu u Beograd i eno ga, 
                još sjedi u skupštini i raspravlja se oko toga ko je lopov, ovi što su sad na vlasti ili oni prije njih.',  
                '2017-06-04 10:35:46', 'Admin Jedan', 2, '2017-06-04 10:35:46', 1, NULL, NULL],
                ['Poziv', '-Halo, je li to policija? - Jeste, izvolite? - Ja nazvao da mi ispričate neki vic.
                 - Gospodine, ovdje se radi, nemamo mi vremena za viceve! - Hahaha, odličan, svaka čast!',  
                '2017-06-04 11:05:29', 'Admin Jedan', 2, '2017-06-04 11:05:29', 1, NULL, NULL],
                ['Plavuši umrla baba', 'Pričaju dvije plavuše, kaže prva: - Umrla mi baba! Odgovara druga: 
                - Ooo, tako mi je žao.. Od čega je umrla? - Od gripa. - Pa dobro, nije strašno.',  
                '2017-06-04 11:14:59', 'Admin Jedan', 2, '2017-06-04 11:14:59', 1, NULL, NULL],
                ['Plavuša priča vic', 'Sjedi plavuša i priča vic: - Idu dvije crne plavuše..',  
                '2017-06-04 10:47:02', 'Admin Jedan', 2, '2017-06-04 10:47:02', 1, NULL, NULL],
                ['Takmičenje iz gramatike', 'Perice, sine, kako je bilo na takmičenju iz gramatike? - Neznam.',  
                '2017-06-04 11:48:59', 'Admin Jedan', 2, '2017-06-04 11:48:59', 1, NULL, NULL],
                ['Lijepa cura', 'Mama kaže Perici: - Lijepa i cura, sine! - Hvala, mama, a nije ni skupa, 50 eura sat.',  
                '2017-06-04 10:28:07', 'Admin Jedan', 2, '2017-06-04 10:28:07', 1, NULL, NULL],
                ['Inteligencija', 'Kaže Fata Muji: - Dokazano je da djeca 80% inteligencije naslijede od majke. 
                Mujo će: - Jeeste, a od oca, kao, samo 30% ?',  
                '2017-06-04 11:05:29', 'Admin Jedan', 2, '2017-06-04 11:05:29', 1, NULL, NULL],
                ['Rođendanski poklon', 'Mujo poklonio Fti za rođendan dijamantni prsten. Sretne ga Haso, a Mujo se odmah pohvali poklonom.
                 Haso ga upita: - Bolan, Mujo, zar nije Fata za rođendan željela sportski auto? - Jeste, ali gdje da nađem lažan automobil?',  
                '2017-06-04 10:13:40', 'Admin Jedan', 2, '2017-06-04 10:13:40', 1, NULL, NULL]
        ]);
    }
}
