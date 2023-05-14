import React from "react"
import styles from "./style/index.module.less"
import {getColorList} from "@/utils/themeColor"
import {useSelector} from "react-redux"
import {GlobalState} from "@/store"

const Bg = (props) => {
    const {settings} = useSelector((state: GlobalState) => state)
    const darkTheme = document.querySelector("body").getAttribute("arco-theme") === "dark"

    const color = (opacity) => {
        const colorValue = darkTheme ? 180 : 255

        return `rgba(${colorValue}, ${colorValue}, ${colorValue}, ${opacity / 10})`
    }

    const themeColorList = getColorList(settings.themeColor)

    const lightColor = themeColorList[darkTheme ? 5 : 1]
    const darkColor = themeColorList[darkTheme ? 1 : 5]

    const bg = `linear-gradient(200deg, ${lightColor} 0%, ${darkColor} 100%)`

    return (
        <div className={styles.bg} style={{background: bg}}>
            <svg className={styles.waves} xmlns="http://www.w3.org/2000/svg" xmlnsXlink="http://www.w3.org/1999/xlink"
                 viewBox="0 24 150 28" preserveAspectRatio="none" shapeRendering="auto">
                <defs>
                    <path id="gentle-wave"
                          d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"/>
                </defs>
                <g className={styles.parallax}>
                    <use xlinkHref="#gentle-wave" x="48" y="0" fill={color(7)}/>
                    <use xlinkHref="#gentle-wave" x="48" y="3" fill={color(5)}/>
                    <use xlinkHref="#gentle-wave" x="48" y="5" fill={color(3)}/>
                    <use xlinkHref="#gentle-wave" x="48" y="7" fill={color(10)}/>
                </g>
            </svg>
            <div className={styles["bottom-block"]} style={{background: color(10)}}></div>
            {props.children}
        </div>
    )
}

export default Bg
