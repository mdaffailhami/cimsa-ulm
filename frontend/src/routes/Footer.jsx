import { Container, Row, Col } from "react-bootstrap";
import ReactLogo from "../assets/react.svg";
import { css } from "@emotion/react";

export default function Footer() {
    return (
        <footer
            css={css`
                background-color: #2d2d2d;
                color: white;
                padding: 20px 0;
                /* margin-top: 20px; */
                /* border-top: 1px solid #ddd; */

                a {
                    color: white;
                }
            `}
        >
            <Container>
                <Row>
                    <Col md={5}>
                        <img
                            src={ReactLogo}
                            alt="Company Logo"
                            style={{
                                width: "40px",
                                height: "auto",
                                marginBottom: "8px",
                            }}
                        />
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Integer nec odio. Praesent libero. Sed cursus
                            ante dapibus diam. Sed nisi. Nulla quis sem at nibh
                            elementum imperdiet. Duis sagittis ipsum. Praesent
                            mauris. Fusce nec tellus sed augue semper porta.
                            Mauris massa. Vestibulum lacinia arcu eget nulla.
                        </p>
                    </Col>
                    <Col md={3}>
                        <h5 style={{ color: "yellow" }}>Contact Info</h5>
                        <p>
                            <i className="fa fa-map-marker" /> 123 Main Street,
                            Anytown, USA 12345
                        </p>
                        <p>
                            <i className="fa fa-phone" /> (123) 456-7890
                        </p>
                        <p>
                            <i className="fa fa-envelope" />{" "}
                            <a href="mailto:info@example.com">
                                info@example.com
                            </a>
                        </p>
                    </Col>
                    <Col md={2}>
                        <h5 style={{ color: "yellow" }}>Follow Us</h5>
                        <ul>
                            <li>
                                <a
                                    href="https://www.facebook.com"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a
                                    href="https://www.twitter.com"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    Twitter
                                </a>
                            </li>
                            <li>
                                <a
                                    href="https://www.instagram.com"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    Instagram
                                </a>
                            </li>
                            <li>
                                <a
                                    href="https://www.linkedin.com"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    LinkedIn
                                </a>
                            </li>
                        </ul>
                    </Col>
                    <Col md={2}>
                        <h5 style={{ color: "yellow" }}>Quick Links</h5>
                        <ul>
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="/about-us">About Us</a>
                            </li>
                            <li>
                                <a href="/blog">Blog</a>
                            </li>
                            <li>
                                <a style={{ color: "white" }} href="/programs">
                                    Programs
                                </a>
                            </li>
                            <li>
                                <a href="/contact-us">Contact Us</a>
                            </li>
                        </ul>
                    </Col>
                </Row>
            </Container>
        </footer>
    );
}
