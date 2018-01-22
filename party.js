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
                "name": "Acid rain",
                "length": "6.40",
                "file": "Acid rain"
            }, {
                "track": 2,
                "name": "Alter Bridge",
                "length": "5.40",
                "file": "Alter Bridge"
            }, {
                "track": 3,
                "name": "be or not",
                "length": "6.19",
                "file": "be or not"
            }, {
                "track": 4,
                "name": "be yourself",
                "length": "4.40",
                "file": "be yourself"
            }, {
                "track": 5,
                "name": "Beautiful",
                "length": "6.32",
                "file": "Beautiful"
            }, {
                "track": 6,
                "name": "bend",
                "length": "3.39",
                "file": "bend"
            }, {
                "track": 7,
                "name": "Big bad world",
                "length": "4.23",
                "file": "Big bad world"
            }, {
                "track": 8,
                "name": "bleeding out",
                "length": "3.41",
                "file": "bleeding out"
            }, {
                "track": 9,
                "name": "Broken arrow",
                "length": "4.34",
                "file": "Broken arrow"
            }, {
                "track": 10,
                "name": "changing",
                "length": "3.35",
                "file": "changing"
            }, {
                "track": 11,
                "name": "charlie",
                "length": "4.45",
                "file": "charlie"
            }, {
                "track": 12,
                "name": "gunslinger",
                "length": "4.11",
                "file": "gunslinger"
            }, {
                "track": 13,
                "name": "how i go",
                "length": "4.32",
                "file": "how i go"
            }, {
                "track": 14,
                "name": "hurt gone",
                "length": "6.25",
                "file": "hurt gone"
            }, {
                "track": 15,
                "name": "it's gauge",
                "length": "3.45",
                "file": "it's gauge"
            }, {
                "track": 16,
                "name": "losing",
                "length": "4:29",
                "file": "losing"
            }, {
                "track": 17,
                "name": "love like this",
                "length": "3:37",
                "file": "love like this"
            }, {
                "track": 18,
                "name": "Nothing in my way",
                "length": "4:01",
                "file": "Nothing in my way"
            }, {
                "track": 19,
                "name": "numb",
                "length": "6:24",
                "file": "numb"
            }, {
                "track": 20,
                "name": "perfect world",
                "length": "2:53",
                "file": "perfect world"
            }, {
                "track": 21,
                "name": "Rest in peace",
                "length": "4:18",
                "file": "Rest in peace"
            }, {
                "track": 22,
                "name": "so far",
                "length": "5:26",
                "file": "so far"
            }, {
                "track": 23,
                "name": "Sugar",
                "length": "3:55",
                "file": "Sugar"
            }, {
                "track": 24,
                "name": "track",
                "length": "4:27",
                "file": "track"
            }, {
                "track": 25,
                "name": "yes",
                "length": "4.21",
                "file": "yes"
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
