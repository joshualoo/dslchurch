module.exports = {
	watch: {
		options: {
			livereload: {
				host: "localhost",
			},
		},
		all: {
			files: ["*.php", "**/*.php"],
		},
		sass: {
			tasks: ["ftp_push:staging"], // this will append the ftp_push:staging task after the css_compile task which is part of the default config
		},
	},
};
