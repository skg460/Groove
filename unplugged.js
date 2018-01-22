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
                "name": "Aaj Din Chadheya (Unplugged)",
                "length": "5:26",
                "file": "Aaj Din Chadheya (Unplugged)"
            }, {
                "track": 2,
                "name": "Baarish  Unplugged",
                "length": "6:24",
                "file": "Baarish  Unplugged"
            }, {
                "track": 3,
                "name": "Banjaara  Unplugged",
                "length": "4:04",
                "file": "Banjaara  Unplugged"
            }, {
                "track": 4,
                "name": "Da Dasse & Udta Punjab",
                "length": "5:39",
                "file": "Da Dasse & Udta Punjab"
            }, {
                "track": 5,
                "name": "Deewani Mastani (Unplugged)",
                "length": "4:21",
                "file": "Deewani Mastani (Unplugged)"
            }, {
                "track": 6,
                "name": "Dhak Dhak  Unplugged",
                "length": "4:04",
                "file": "Dhak Dhak  Unplugged"
            }, {
                "track": 7,
                "name": "Dil Darbadar  Unplugged",
                "length": "6:22",
                "file": "Dil Darbadar  Unplugged"
            }, {
                "track": 8,
                "name": "Duma Dum  Unplugged",
                "length": "4:36",
                "file": "Duma Dum  Unplugged"
            }, {
                "track": 9,
                "name": "Gulabi (MTV Unplugged)",
                "length": "3:47",
                "file": "Gulabi (MTV Unplugged)"
            }, {
                "track": 10,
                "name": "Humdard  Unplugged",
                "length": "5:43",
                "file": "Humdard  Unplugged"
            }, {
                "track": 11,
                "name": "Jee Karda (Unplugged)",
                "length": "7:26",
                "file": "Jee Karda (Unplugged)"
            }, {
                "track": 12,
                "name": "Jeena Jeena (Unplugged)",
                "length": "6:06",
                "file": "Jeena Jeena (Unplugged)"
            }, {
                "track": 13,
                "name": "Jiyein Kyun  Unplugged",
                "length": "5:44",
                "file": "Jiyein Kyun  Unplugged"
            }, {
                "track": 14,
                "name": "Kamli (MTV Unplugged)",
                "length": "6.14",
                "file": "Kamli (MTV Unplugged)"
            }, {
                "track": 15,
                "name": "Kaun Mera  Unplugged",
                "length": "5:44",
                "file": "Kaun Mera  Unplugged"
            }, {
                "track": 16,
                "name": "Kuchh Toh Hua Hai  Unplugged",
                "length": "6:30",
                "file": "Kuchh Toh Hua Hai  Unplugged"
            }, {
                "track": 17,
                "name": "Main Jahaan Rahoon (Unplugged)",
                "length": "6:26",
                "file": "Main Jahaan Rahoon (Unplugged)"
            }, {
                "track": 18,
                "name": "Mileya Mileya (Unplugged)",
                "length": "5:34",
                "file": "Mileya Mileya (Unplugged)"
            }, {
                "track": 19,
                "name": "Moh Moh Ke Dhaage (MTV Unplugged)",
                "length": "5:11",
                "file": "Moh Moh Ke Dhaage (MTV Unplugged)"
            }, {
                "track": 20,
                "name": "Mohe Rang Do Laal (Unplugged)",
                "length": "4:16",
                "file": "Mohe Rang Do Laal (Unplugged)"
            }, {
                "track": 21,
                "name": "Nain Parindey (MTV Unplugged)",
                "length": "5:19",
                "file": "Nain Parindey (MTV Unplugged)"
            }, {
                "track": 22,
                "name": "O Re Piya (MTV Unplugged)",
                "length": "4:25",
                "file": "O Re Piya (MTV Unplugged)"
            }, {
                "track": 23,
                "name": "O Saathi O Saathi (MTV Unplugged)",
                "length": "4:30",
                "file": "O Saathi O Saathi (MTV Unplugged)"
            }, {
                "track": 24,
                "name": "Pani Da Rang (Unplugged)",
                "length": "6:56",
                "file": "Pani Da Rang (Unplugged)"
            }, {
                "track": 25,
                "name": "Pareshaan (MTV Unplugged)",
                "length": "5:11",
                "file": "Pareshaan (MTV Unplugged)"
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
