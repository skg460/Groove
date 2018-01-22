jQuery(function ($) {
    'use strict'
    var supportsAudio = !!document.createElement('audio').canPlayType;
    if (supportsAudio) {
        var index = 0,
            playing = false,
            mediaPath = '',
            extension = 'mp3',
            tracks = [{
                "track": 1,
                "name": "Sai_Ve_Sai",
                "length": "2:54",
                "file": "Sai_Ve_Sai"
            }, {
                "track": 2,
                "name": "lal_meri_pat",
                "length": "8:00",
                "file": "lal_meri_pat"
            }, {
                "track": 3,
                "name": "Dum_Mast",
                "length": "5:36",
                "file": "Dum_Mast"
            }, {
                "track": 4,
                "name": "Charkha",
                "length": "4:34",
                "file": "Charkha"
            }, {
                "track": 5,
                "name": "Allah_Hoo",
                "length": "6:29",
                "file": "Allah_Hoo"
            }, {
                "track": 6,
                "name": "Aaja_veh_Mahi",
                "length": "4:22",
                "file": "Aaja_veh_Mahi"
            }, {
                "track": 7,
                "name": "Tum_Meri_Rakho_Laaj",
                "length": "4.40",
                "file": "Tum_Meri_Rakho_Laaj"
            }, {
                "track": 8,
                "name": "Subah_Subah_Le_Shiv",
                "length": "5:35",
                "file": "Subah_Subah_Le_Shiv"
            }, {
                "track": 9,
                "name": "Shyam_Teri_Bansi_Pukare",
                "length": "5:23",
                "file": "Shyam_Teri_Bansi_Pukare"
            }, {
                "track": 10,
                "name": "Ragupati_Raghav_Raja_Ram",
                "length": "8:55",
                "file": "Ragupati_Raghav_Raja_Ram"
            }, {
                "track": 11,
                "name": "Om_Jai_Jagdish_Hare",
                "length": "4:26",
                "file": "Om_Jai_Jagdish_Hare"
            }, {
                "track": 12,
                "name": "O_Palan_Hare",
                "length": "5:29",
                "file": "O_Palan_Hare"
            }, {
                "track": 13,
                "name": "Mangal_Bhavan",
                "length": "3:29",
                "file": "Mangal_Bhavan"
            }, {
                "track": 14,
                "name": "Lord_Shiva_Sushti",
                "length": "7:13",
                "file": "Lord_Shiva_Sushti"
            }, {
                "track": 15,
                "name": "Itni_shakti_hame_dena_data",
                "length": "4:49",
                "file": "Itni_shakti_hame_dena_data"
            }, {
                "track": 16,
                "name": "Govind_Jai_Jai",
                "length": "3:03",
                "file": "Govind_Jai_Jai"
            }, {
                "track": 17,
                "name": "Bhor_Bhai_Din_Char",
                "length": "5:21",
                "file": "Bhor_Bhai_Din_Char"
            }, {
                "track": 18,
                "name": "Bhor_Bhai_Din_Char",
                "length": "5:21",
                "file": "Bhor_Bhai_Din_Char"
            }, {
                "track": 19,
                "name": "Badi_der_baee_nand_lala",
                "length": "3:53",
                "file": "Badi_der_baee_nand_lala"
            }, {
                "track": 20,
                "name": "Aisa_Pyaar_Baha_De",
                "length": "3:03",
                "file": "Aisa_Pyaar_Baha_De"
            }, {
                "track": 21,
                "name": "Ae_maalik_tere_bande",
                "length": "2:53",
                "file": "Ae_maalik_tere_bande"
            }, {
                "track": 22,
                "name": "Ae_maalik_tere_bande",
                "length": "2:53",
                "file": "Ae_maalik_tere_bande"
            }, {
                "track": 23,
                "name": "Aarti_Kunj_Bihari_Ki",
                "length": "3:09",
                "file": "Aarti_Kunj_Bihari_Ki"
            }, {
                "track": 24,
                "name": "Achyutam_Keshavam",
                "length": "5:50",
                "file": "Achyutam_Keshavam"
            }, {
                "track": 25,
                "name": "Achyutam_Keshavam",
                "length": "5:50",
                "file": "Achyutam_Keshavam"
            }],
            buildPlaylist = $.each(tracks, function(key, value) {
                var trackNumber = value.track,
                    trackName = value.name,
                    trackLength = value.length;
                if (trackNumber.toString().length === 1) {
                    trackNumber = '0' + trackNumber;
                } else {
                    trackNumber = '' + trackNumber;
                }
                $('#plList').append('<li><div class="plItem"><div class="plNum">' + trackNumber + '.</div><div class="plTitle">' + trackName + '</div><div class="plLength">' + trackLength + '</div></div></li>');
            }),
            trackCount = tracks.length,
            npAction = $('#npAction'),
            npTitle = $('#npTitle'),
            audio = $('#myAudio').bind('play', function () {
                playing = true;
                npAction.text('Now Playing...');
            }).bind('pause', function () {
                playing = false;
                npAction.text('Paused...');
            }).bind('ended', function () {
                npAction.text('Paused...');
                if ((index + 1) < trackCount) {
                    index++;
                    loadTrack(index);
                    audio.play();
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }).get(0),
            btnPrev = $('#btnPrev').click(function () {
                if ((index - 1) > -1) {
                    index--;
                    loadTrack(index);
                    if (playing) {
                        audio.play();
                    }
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }),
            btnNext = $('#btnNext').click(function () {
                if ((index + 1) < trackCount) {
                    index++;
                    loadTrack(index);
                    if (playing) {
                        audio.play();
                    }
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }),
            li = $('#plList li').click(function () {
                var id = parseInt($(this).index());
                if (id !== index) {
                    playTrack(id);
                }
            }),
            loadTrack = function (id) {
                $('.plSel').removeClass('plSel');
                $('#plList li:eq(' + id + ')').addClass('plSel');
                npTitle.text(tracks[id].name);
                index = id;
                audio.src = mediaPath + tracks[id].file + extension;
            },
            playTrack = function (id) {
                loadTrack(id);
                audio.play();
            };
        extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';
        loadTrack(index);
    }
});

//initialize plyr
plyr.setup($('#myAudio'), {});
