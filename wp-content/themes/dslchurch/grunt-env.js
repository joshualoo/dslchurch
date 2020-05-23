module.exports = {
	watch: {
		options: {
			livereload: true,
		},
		sass: {
			files: ["sass/*.scss", "sass/**/*.scss"],
		},
		js: {
			files: ["js/**/*script.js"],
		},
		php: {
			files: ["*.php", "**/*.php"],
		},
	},
};
