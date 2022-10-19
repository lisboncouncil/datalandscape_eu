var GAPINDU_CONFIG = {
 "data": {
  "lastModified": 1522082965000,
  "path": "/sites/all/themes/datalandscape01/edmassets/data/all-indu.csv",
  "reader": "csv-time_in_columns",
  "ddfPath": "/sites/all/themes/datalandscape01/edmassets/data/all-indu.csv"
 },
 "locale": {
  "filePath": "/sites/all/themes/datalandscape01/edmassets/translation/",
  "id": "en"
 },
 "state": {
  "entities": {
   "autoconfig": {
    "excludeIDs": [
     "tag"
    ],
    "type": "entity_domain"
   },
   "dim": "Industry",
   "show": {},
   "skipFilter": false
  },
  "entities_colorlegend": {
   "autoconfig": {
    "excludeIDs": [
     "tag"
    ],
    "type": "entity_domain"
   },
   "dim": "_default",
   "show": {},
   "skipFilter": false
  },
  "entities_tags": {
   "autoconfig": {
    "includeOnlyIDs": [
     "tag"
    ],
    "type": "entity_domain"
   },
   "dim": null,
   "show": {},
   "skipFilter": false
  },
  "marker": {
   "allowSelectMultiple": true,
   "axis_x": {
    "allow": {
     "scales": [
      "linear",
      "log",
      "genericLog",
      "time",
      "pow"
     ]
    },
    "autoconfig": {
     "index": 0,
     "type": "measure"
    },
    "data": "data",
    "domainMax": null,
    "domainMin": null,
    "scaleType": "linear",
    "use": "indicator",
    "which": "Data Market Value",
    "zoomedMax": 24000000000,
    "zoomedMin": null
   },
   "axis_y": {
    "allow": {
     "scales": [
      "linear",
      "log",
      "genericLog",
      "time",
      "pow"
     ]
    },
    "autoconfig": {
     "index": 1,
     "type": "measure"
    },
    "data": "data",
    "domainMax": null,
    "domainMin": null,
    "scaleType": "linear",
    "use": "indicator",
    "which": "Number of Data Users",
    "zoomedMax": 220000,
    "zoomedMin": null
   },
   "color": {
    "allow": {
     "scales": [
      "linear",
      "log",
      "genericLog",
      "time",
      "pow",
      "ordinal"
     ]
    },
    "autoconfig": {},
    "data": "data",
    "palette": {
     "0": "hsl(12, 76%, 61%)",
     "25": "hsl(27, 87%, 67%)",
     "50": "hsl(43, 74%, 66%)",
     "75": "hsl(173, 58%, 39%)",
     "100": "hsl(197, 37%, 24%)",
     "_default": "#ffb600"
    },
    "paletteLabels": null,
    "scaleType": "linear",
    "syncModels": [
     "marker_colorlegend"
    ],
    "use": "indicator",
    "which": "Data Market Value"
   },
   "highlight": [],
   "label": {
    "autoconfig": {
     "includeOnlyIDs": [
      "name"
     ],
     "type": "string"
    },
    "data": "data",
    "scaleType": "ordinal",
    "use": "property",
    "which": "Industry"
   },
   "opacityHighlightDim": 0.1,
   "opacityRegular": 1,
   "opacitySelectDim": 0.3,
   "select": [],
   "size": {
    "allow": {
     "scales": [
      "ordinal",
      "linear",
      "log",
      "genericLog",
      "pow"
     ]
    },
    "autoconfig": {
     "index": 2,
     "type": "measure"
    },
    "data": "data",
    "domainMax": null,
    "domainMin": null,
    "extent": [
     0,
     0.85
    ],
    "scaleType": "linear",
    "use": "indicator",
    "which": "Data Market Value",
    "zoomedMax": null,
    "zoomedMin": null
   },
   "size_label": {
    "_important": false,
    "allow": {
     "names": [
      "_default"
     ],
     "scales": [
      "ordinal",
      "linear",
      "log",
      "genericLog",
      "pow"
     ]
    },
    "data": "data",
    "domainMax": null,
    "domainMin": null,
    "extent": [
     0,
     0.33
    ],
    "scaleType": "ordinal",
    "use": "constant",
    "which": "_default",
    "zoomedMax": null,
    "zoomedMin": null
   },
   "skipFilter": false,
   "space": [
    "entities",
    "time"
   ],
   "superHighlight": []
  },
  "marker_colorlegend": {
   "allowSelectMultiple": true,
   "highlight": [],
   "hook_geoshape": {
    "data": "data",
    "use": "property",
    "which": "shape_lores_svg"
   },
   "hook_rank": {
    "data": "data",
    "use": "property",
    "which": "rank"
   },
   "label": {
    "data": "data",
    "use": "property",
    "which": "name"
   },
   "opacityHighlightDim": 0.1,
   "opacityRegular": 1,
   "opacitySelectDim": 0.3,
   "select": [],
   "skipFilter": false,
   "space": [
    "entities_colorlegend"
   ],
   "superHighlight": []
  },
  "marker_tags": {
   "allowSelectMultiple": true,
   "highlight": [],
   "hook_parent": {
    "data": "data",
    "which": null
   },
   "label": {
    "data": "data",
    "use": "property",
    "which": "name"
   },
   "opacityHighlightDim": 0.1,
   "opacityRegular": 1,
   "opacitySelectDim": 0.3,
   "select": [],
   "skipFilter": false,
   "space": [
    "entities_tags"
   ],
   "superHighlight": []
  },
  "time": {
   "autoconfig": {
    "type": "time"
   },
   "delay": 395,
   "delayThresholdX2": 90,
   "delayThresholdX4": 45,
   "dim": "time",
   "end": "2025",
   "endOrigin": null,
   "endSelected": "2025",
   "format": {
    "data": null,
    "ui": null
   },
   "immediatePlay": true,
   "loop": false,
   "offset": 0,
   "playable": true,
   "playing": false,
   "record": false,
   "round": "round",
   "start": "2013",
   "startOrigin": null,
   "startSelected": "2013",
   "step": 1,
   "unit": "year",
   "value": "2025"
  }
 },
 "ui": {
  "adaptMinMaxZoom": false,
  "buttons": [
   "colors",
   "find",
   "zoom",
   "trails",
   "lock",
   "moreoptions",
   "fullscreen",
   "presentation"
  ],
  "chart": {
   "labels": {
    "dragging": true,
    "removeLabelBox": false
   },
   "lockNonSelected": 0,
   "margin": {
    "left": 80.37,
    "top": 0
   },
   "superhighlightOnMinimapHover": true,
   "trails": true,
   "whenHovering": {
    "higlightValueX": true,
    "higlightValueY": true,
    "showProjectionLineX": true,
    "showProjectionLineY": true
   }
  },
  "cursorMode": "arrow",
  "datawarning": {
   "doubtDomain": [],
   "doubtRange": []
  },
  "dialogs": {
   "moreoptions": [
    "opacity",
    "speed",
    "axes",
    "size",
    "colors",
    "label",
    "zoom",
    "presentation",
    "about"
   ],
   "popup": [
    "colors",
    "find",
    "size",
    "zoom",
    "moreoptions"
   ],
   "sidebar": [
    //"colors",
    //"find",
    //"size",
    //"zoom"
   ]
  },
  "panWithArrow": false,
  "presentation": false,
  "show_ticks": true,
  "splash": false,
  "zoomOnScrolling": false
 },
 "chartType": "BubbleChart"
};