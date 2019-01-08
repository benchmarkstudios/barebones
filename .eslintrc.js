module.exports = {
  "root": true,
  "parserOptions": {
    "parser": "babel-eslint",
    "ecmaVersion": 2017,
    "sourceType": "module"
  },
  "env": {
    "browser": true,
    "node": true,
    "es6": true
  },
  "globals": {
    "window": true,
    "location": true
  },
  "extends": [
    "airbnb-base",
  ],
  // custom rules here
  "rules": {
    // don"t require .vue extension when importing
    "import/extensions": ["error", "always", {
      "js": "never",
      "vue": "js",
      "mjs": "never"
    }],
    "no-param-reassign": ["error", {
      "props": true,
      "ignorePropertyModificationsFor": [
        "event", // for e.returnvalue
        "response", // for Express responses
        "item", // for item usually within each loops
      ]
    }],
    // allow debugger during development
    "no-debugger": process.env.NODE_ENV === "production" ? 2 : 0
  }
}
